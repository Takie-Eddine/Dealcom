<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ClientController extends Controller
{
    public function index(){

        $users = User::when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })->paginate(\request()->limit_by ?? 15);

        return view('admin.client.index',compact('users'));
    }



    public function create(){

        return view('admin.client.create',[
            'countries' => Countries::getNames(),
        ]);
    }



    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' =>  ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' =>  ['required','regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('profiles','phone')],
            'password' => ['required','string', 'min:8'],
            'fname' => ['nullable' ,'string' , 'max:255'],
            'lname' => ['nullable' ,'string' , 'max:255'],
            'country' => ['nullable' ,'string' , 'size:2'],
            'address' => ['nullable', 'string', 'min:10', 'max:255'],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($photo = $request->file('avatar')) {
            $file_name = uploadImage($photo, 'user_images', $request->name);
            $input['photo'] =  $file_name;
        }

        $input['first_name'] = $request-> fname;
        $input['last_name'] = $request-> lname;
        $input['phone'] = $request-> phone;
        $input['country'] = $request-> country;
        $input['street_address'] = $request->address ;

        $user->profile->fill($input)->save();

        event(new Registered($user));

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->back();

    }



    public function active($id){

        $user = User::findOrFail($id);

        if ($user->status == 'active') {
            $user->update([
                'status' => 'inactive',
            ]);
        } else {
            $user->update([
                'status' => 'active',
            ]);
        }

        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->back();

    }


    public function edit($id){

        $user = User::findOrFail($id);

        return view('admin.client.edit',[
            'user'=> $user,
            'countries' => Countries::getNames(),
        ]);

    }



    public function update(Request $request, $id){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' =>  ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($id,'id')],
            'phone' =>  ['required','regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('profiles','phone')->ignore($id,'user_id')],
            'password' => ['required','string', 'min:8'],
            'fname' => ['nullable' ,'string' , 'max:255'],
            'lname' => ['nullable' ,'string' , 'max:255'],
            'country' => ['nullable' ,'string' , 'size:2'],
            'address' => ['nullable', 'string', 'min:10', 'max:255'],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);

        $user = User::findOrFail($id);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password) ,
            ]);
        }

        if ($user->email != $request->email) {
            $user->update([
                'email' => $request->email
            ]);
            event(new Registered($user));
        }


        if ($photo = $request->file('avatar')) {
            UnlinkImage('user_images',$user->photo,$user);
            $file_name = uploadImage($photo, 'user_images', $request->name);
            $input['photo'] =  $file_name;
        }

        $input['first_name'] = $request-> fname;
        $input['last_name'] = $request-> lname;
        $input['phone'] = $request-> phone;
        $input['country'] = $request-> country;
        $input['street_address'] = $request->address ;

        $user->profile->fill($input)->save();
        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 8000]);
        return redirect()->back();
    }


    public function delete($id){

        $user = User::findOrFail($id);

        $user->delete();

        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 8000]);

        return redirect()->back();
    }


    public function show($id){

        $user = User::findOrFail($id);
        return view('admin.client.show',compact('user'));

    }


    public function wishlist($id){

        $user = User::findOrFail($id);

        $wishlist = $user->wishlists;

        return view('admin.client.wishlist',compact('user','wishlist'));

    }


    public function request($id){

        $user = User::findOrFail($id);

        $request = $user->request;

        return view('admin.client.request',compact('user','request'));

    }
}
