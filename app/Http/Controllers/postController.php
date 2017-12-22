<?php

namespace App\Http\Controllers;
use App\posts;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class postController extends Controller
{
   public function submit(Request $request){
       $user= Auth::user();
       if($request->file('image')){ 
       $filename = $request->file('image')->getClientOriginalName();
       $path = $request->file('image')->storeAs('public/images',$filename);
       }else{
           $filename ='';
       }
   Auth::user()->posts()->create([
        'caption'=>$request->input('caption'),
        'image'=>$filename,
    ]);

   
    
    return redirect()->route('home')->with('info', 'Post added Succefully');
    
    }

}
