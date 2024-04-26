<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    public function index(){

        $admin = Auth::user('admin');

        return view('admin.profile.index',[
            'admin' => $admin,
        ]);

    }


    public function edit ($id){

        $admin = Admin::findOrFail($id);

        return view('admin.profile.edit',[
            'admin' => $admin,
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
        ]);

    }

    public function update(Request $request){

        $request->validate([
            'fname' => ['required' ,'string' , 'max:255'],
            'lname' => ['required' ,'string' , 'max:255'],
            'birthday' => ['required' ,'date' , 'before:today'],
            'gender' => ['in:male,female'],
            'country' => ['required' ,'string' , 'size:2'],
            'city' => ['required' ,'string'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('admin_profiles','phone')] ,
            //'state' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:10', 'max:255'],
            //'locale' => ['required' ,'string' ],
            'postal_code' => ['required' , 'integer' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);


        $admin = $request->user();

        if ($photo = $request->file('avatar')) {
            UnlinkImage('profile',$admin->photo,$admin);
            $file_name = uploadImage($photo, 'profile', $request->name);
            $input['photo'] =  $file_name;
        }

        $input['first_name'] = $request-> fname;
        $input['last_name'] = $request-> lname;
        $input['birthday'] = $request-> birthday;
        $input['gender'] = $request-> gender;
        $input['phone'] = $request-> phone;
        $input['country'] = $request-> country;
        $input['city'] = $request-> city;
        $input['street_address'] = $request->address ;
        $input['postal_code'] = $request-> postal_code;

        $admin->profile->fill($input)->save();



        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();


    }


    public function update_email(Request $request){

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('admins','email')->ignore(Auth::user('admin')->id)],
        ]);
        $admin = $request->user();
        $admin->update([
            'email' => $request->email,
        ]);

        $admin->email_verified_at = null;
        $admin->save();

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('admin.login');

    }



    public function update_password(Request $request){

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = $request->user();
        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success',
        ]);

    }


    public function deactivate(Request $request){

        $request->validate([
            'deactivate' => ['required'],
        ]);

        $admin = $request->user();

        Auth::guard('admin')->logout();

        $admin->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');

    }





}
