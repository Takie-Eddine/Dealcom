<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use App\Models\RequestDetail;
use App\Notifications\ProductRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;

class RequestController extends Controller
{
    public function index(){

        $requests = ModelsRequest::with(['details','product'])
                    ->where('user_id',Auth::user('web')->id)
                    ->when(request()->keyword != null,function ($query){
                        $query->search(request()->keyword);
                    })
                    ->when(\request()->status != null, function ($query) {
                        $query->whereStatus(\request()->status);
                    })
                    ->paginate(\request()->limit_by ?? 15);


        return view('user.dashboard.request.index',compact('requests'));
    }



    public function create(){

        $attributes = Attribute::select('id','name')->get();
        return view('user.dashboard.request.create',[
            'countries' => Countries::getNames(),
            'attributes' => $attributes,
            ]);
    }


    public function store(Request $request){

        $request->validate([
            'code' => ['required',Rule::exists('products','slug')],
            'name' => ['required', 'min:3'],
            'category' => ['nullable','min:3'],
            'quantity' => ['required','numeric','min:1'],
            'unit' => ['required','in:box,piece,container,dozen'],
            'country' => ['required' ,'string' , 'size:2'],
            'shipping_method' => ['required' ,'in:sea freight,air freight,land freight'],
            'description' => ['required', 'min:1' ],
        ]);

        $product = Product::where('slug','=',$request->code)->FirstOrFail();

        $modelrequest = ModelsRequest::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'status' => 'pending',
        ]);

        RequestDetail::create([
            'request_id' =>$modelrequest->id ,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'country' => $request->country,
            'shipping_type' => $request->shipping_method,
            'description' => $request->description,
        ]);
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new ProductRequestNotification($modelrequest));
        }


        toastr()->success(' Your Request Had Been Submited !', 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('request');
    }

    public function show($id){

        $modelrequest = ModelsRequest::findOrFail($id);

        $messages = [];
        $chat = new Chat();
        if ($modelrequest->chat) {
            $chat = Chat::where('request_id',$modelrequest->id)->firstOrFail();

            $messages = $chat->messages()->get();

        }

        return view('user.dashboard.request.show', compact('modelrequest', 'chat', 'messages'));
    }

    public function addMessage(Request $request){

        $request->validate([
            'body' => [
                Rule::requiredIf(function()use($request){
                    return !$request->has('file');
                }),
                ],
            'file' => [
                Rule::requiredIf(function()use($request){
                    return !$request->input('body');
                }),
                'file',
                'mimes:doc,docx,pdf,xls,xlsx,csv,tsv,ppt,pptx,pages,odt,rtf,jpg,jpeg,png','max:8192'],
            'request_id' => ['required',Rule::exists('requests','id')],
            'conversation_id' => [
                Rule::requiredIf(function() use ($request) {
                    return !$request->input('admin_id');
                }),
                'int',
                'exists:chats,id',
            ],
        ]);

        if (!$request->input('conversation_id')) {
            $chat = Chat::create([
                'request_id' => $request->request_id,
                'admin_id' => Auth::id(),
                'user_id' => $request->user_id,
                'type' => 'peer',
            ]);
            if ($file = $request->file('file')) {

                $file_name = $file->getClientOriginalName();
                $file->move(public_path('assets/messages/'),$file_name);

                $messages = ChatMessage::create([
                    'chat_id' => $chat->id,
                    'user_id' => $request->user_id,
                    'body' => $file_name,
                    'type' => 'attachement',
                ]);
            } else {
                $messages = ChatMessage::create([
                    'chat_id' => $chat->id,
                    'user_id' => $request->user_id,
                    'body' => $request->body,
                    'type' => 'text',
                ]);
            }


        }else{
            $user = Chat::find($request->conversation_id)->request->user;
            if ($file = $request->file('file')) {

                $file_name = $file->getClientOriginalName();
                $file->move(public_path('assets/messages/'),$file_name);

                $messages = ChatMessage::create([
                    'chat_id' => $request->conversation_id,
                    'user_id' => $user->id,
                    'body' => $file_name,
                    'type' => 'attachement',
                ]);
            } else {
                $messages = ChatMessage::create([
                    'chat_id' => $request->conversation_id,
                    'user_id' => $user->id,
                    'body' => $request->body,
                    'type' => 'text',
                ]);
            }


        }

        return $messages;

    }


    public function downloadMessage($id){
        $message = ChatMessage::findOrFail($id);

        return response()->download(public_path('assets/messages/'.$message->body));
    }


    public function download($id){

        $modelrequest = ModelsRequest::findOrFail($id);

        return response()->download(public_path('assets/files/'.$modelrequest->offer));
    }

}
