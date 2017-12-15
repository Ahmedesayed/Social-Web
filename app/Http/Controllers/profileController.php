<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;




class profileController extends Controller
{
    public function submit(Request $request){
        $this->validate($request,[
            'firstname'=>'required|max:120',
            'lastname'=>'required|max:120',
            'birthdate'=>'required',
            'gender'=>'required|not_in:Choose Gender',
            'mstatus'=>'not_in:Choose Your Relationship'
            ]);
        $filename = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images',$filename);
        $user = Auth::user();
        $user->first_name = $request['firstname'];
        $user->last_name = $request['lastname'];
        $user->gender = $request['gender'];
        $user->marital_status = $request['mstatus'];
        $user->bio = $request['bio'];
        $user->phone_number1 = $request['phonenumber'];
        $user->phone_number2 = $request['phonenumber1'];
        $user->hometown = $request['hometown'];
        $user->birthdate = $request['birthdate'];
        $user->image = $filename;
        $user->update();
        $user = Auth::user();
        return redirect('/home');        
    }

    public function edit(Request $request){
        $this->validate($request,[
            'password'=>'required|min:8',
            'gender'=>'not_in:Choose Gender',
            'mstatus'=>'not_in:Choose Your Relationship',
            ]);
        $filename = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images',$filename);
        $user = Auth::user();
        $user->password = bcrypt($request['password']);
        $user->username = $request['username'];
        $user->first_name = $request['firstname'];
        $user->last_name = $request['lastname'];
        $user->gender = $request['gender'];
        $user->marital_status = $request['mstatus'];
        $user->bio = $request['bio'];
        $user->phone_number1 = $request['phonenumber'];
        $user->phone_number2 = $request['phonenumber1'];
        $user->hometown = $request['hometown'];
        $user->birthdate = $request['birthdate'];
        $user->image = $filename;
        $user->update();
        $user = Auth::user();
        return redirect('/home');        
    }

    
}
