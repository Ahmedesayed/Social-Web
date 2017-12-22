<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\User;
use App\friends;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $mine_posts = $user->posts;
            $friends = $user->friends();
          //  dd($friends);
           
            return view('home')->with('posts',$mine_posts);
            }
        }
    
}
