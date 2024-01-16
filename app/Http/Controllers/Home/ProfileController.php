<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user('web');

        return view('user.dashboard.profile.index',compact('user'));
    }

    public function edit ($id){

        $user = User::findOrFail($id);

        return view('user.dashboard.profile.edit',[
            'user' => $user,
            'countries' => Countries::getNames(),
        ]);

    }


    public function update(Request $request){

        $user = $request->user();
        $request->validate([
            'fname' => ['required' ,'string' , 'max:255'],
            'lname' => ['required' ,'string' , 'max:255'],
            'country' => ['required' ,'string' , 'size:2'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('profiles','phone')->ignore($user->profile->user_id,'user_id')] ,
            //'state' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:10', 'max:255'],
            //'locale' => ['required' ,'string' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);


        $input['first_name'] = $request-> fname;
        $input['last_name'] = $request-> lname;
        $input['phone'] = $request-> phone;
        $input['country'] = $request-> country;
        $input['address'] = $request->address ;



        if ($photo = $request->file('avatar')) {
            if(File::exists('assets/images/user_images/'.$user->profile->photo) && $user->profile->photo) {
                unlink('assets/images/user_images/'.$user->profile->photo);
                $user->profile->photo = null ;
                $user->profile->save();
            }
            $file_name = Str::slug($request->fname).".".$photo->getClientOriginalExtension();
            $path = public_path('assets/images/user_images/' .$file_name);
            Image::make($photo->getRealPath())->resize(500,null,function($constraint){
                $constraint->aspectRatio();
            })->save($path,100);

            $input['photo'] =  $file_name;
        }

        $user->profile->fill($input)->save();

        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();


    }

    public function update_email(Request $request){

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore(Auth::user('web')->id)],
        ]);
        $user = $request->user();
        $user->update([
            'email' => $request->email,
        ]);

        $user->email_verified_at = null;
        $user->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');

    }



    public function update_password(Request $request){

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = $request->user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success',
        ]);

    }
}
