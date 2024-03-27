<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Request as ModelsRequest;
use App\Notifications\NewEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;

class RequestController extends Controller
{
    public function index(){

        $requests = ModelsRequest::with(['details','product'])
                    ->when(request()->keyword != null,function ($query){
                        $query->search(request()->keyword);
                    })
                    ->when(\request()->status != null, function ($query) {
                        $query->whereStatus(\request()->status);
                    })
                    ->paginate(\request()->limit_by ?? 15);


        return view('admin.request.index',compact('requests'));
    }


    public function edit($id){

        $request = ModelsRequest::findOrFail($id);
        $countries = Countries::getNames();

        return view('admin.request.edit',compact('request','countries'));
    }


    public function update(Request $request,$id){


        $request->validate([
            'product_id' => [ Rule::requiredIf(function() use($request){
                                    return $request->input('name');
                                }),
                                Rule::exists('requests','product_id')
                            ],
            'name' => [Rule::requiredIf(function() use($request){
                                return $request->input('product_id');
                            }),
                        ],
            'category' => ['nullable','min:3'],
            'quantity' => ['required','numeric','min:1'],
            'unit' => ['required','in:box,piece,container,dozen'],
            'country' => ['required' ,'string' , 'size:2'],
            'shipping_method' => ['required' ,'in:sea freight,air freight,land freight'],
            'description' => ['required', 'min:1' ],
            'status' => ['required','in:pending,approved,canceled,ordered'],
            'offer' => ['nullable', 'file', 'mimes:doc,docx,pdf,xls,xlsx,csv,tsv,ppt,pptx,pages,odt,rtf','max:8192']
        ]);


        $modelrequest = ModelsRequest::findOrFail($id);


        if ($file =  $request->file('offer')) {
            $file_name = $modelrequest->user->name.'-'.$file->getClientOriginalName();
            $file->move(public_path('assets/files/'),$file_name);
            $modelrequest->update([
                'offer' => $file_name,
            ]);
        }
        $modelrequest->update([
            'admin_id' => Auth::user()->id,
            'status' => $request->status,
        ]);

        $modelrequest->details()->update([
            'request_id' =>$modelrequest->id ,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'country' => $request->country,
            'shipping_type' => $request->shipping_method,
            'description' => $request->description,
        ]);

        if ($modelrequest->status == 'approved') {
            $modelrequest->user->notify(new NewEmailNotification($modelrequest,$modelrequest->product));
        }


        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();

    }


    public function send($id){

        $modelrequest = ModelsRequest::findOrFail($id);

        return view('');

    }


    public function show($id){

        $modelrequest = ModelsRequest::findOrFail($id);
        $messages = [];
        $chat = new Chat();
        if ($modelrequest->chat) {
            $chat = Chat::where('request_id',$modelrequest->id)->firstOrFail();

            $messages = $chat->messages()->get();

        }

        return view('admin.request.show', compact('modelrequest','chat','messages'));
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
                    return !$request->input('user_id');
                }),
                'int',
                'exists:chats,id',
            ],
        ]);

        if (!$request->input('conversation_id')) {
            $chat = Chat::create([
                'request_id' => $request->request_id,
                'admin_id' => Auth::user('admin')->id,
                'user_id' => $request->user_id,
                'type' => 'peer',
            ]);
            if ($file = $request->file('file')) {

                $file_name = $file->getClientOriginalName();
                $file->move(public_path('assets/messages/'),$file_name);

                $messages = ChatMessage::create([
                    'chat_id' => $chat->id,
                    'admin_id' => Auth::user('admin')->id,
                    'body' => $file_name,
                    'type' => 'attachement',
                ]);
            } else {
                $messages = ChatMessage::create([
                    'chat_id' => $chat->id,
                    'admin_id' => Auth::user('admin')->id,
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
                    'admin_id' => Auth::user('admin')->id,
                    'body' => $file_name,
                    'type' => 'attachement',
                ]);
            } else {
                $messages = ChatMessage::create([
                    'chat_id' => $request->conversation_id,
                    'admin_id' => Auth::user('admin')->id,
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
