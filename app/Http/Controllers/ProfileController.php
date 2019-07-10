<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $id=Auth::user()->id;
        $user=User::Find($id);

        return view('profile.myprofile', compact('user'));
    }

    public function index2($id)
    {
        $user=User::Find($id);

        return view('profile.profile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request,$id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->about_me = $request->input('about_me');

        if($request->file('profile_picture')){
            $file= $user->profile_picture;
            $filename = public_path().'/images/'.$file;
            \File::delete($filename);

        $image = $request->file('profile_picture');
        if($image) {
            $new_name = rand() . '.' . $image->getClientOriginalName();

            $image->move(public_path('images'), $new_name);
            $user->profile_picture= $new_name;
        }
        }

        $user->save();

        return view('profile.myprofile', compact('user'));
    }

    public function changepassword($id)
    {
        $user = User::Find($id);
        return view('profile.changepassword',compact('user'));
    }

    public function updatepassword(PasswordRequest $request)
    {
        $user = User::find(Auth::id());
        if (Hash::check( $request->input('current'), $user->password)) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('successMsg',"Password changed");
        }

        else{
            return redirect()->back();
        }

    }

    public function delete($id)
    {
        $user = User::Find($id);

        return view('profile.delete', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::Find(Auth::user()->id);

            Auth::logout();

        $user->delete();

        return redirect('/')->with('success','Account removed');
    }
}
