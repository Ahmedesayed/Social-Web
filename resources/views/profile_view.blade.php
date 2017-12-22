@extends('layouts.app')

@section('content')

{{--  profile page of users   --}}
@if($another_profile)
        {{--  user not authenticated  --}}
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="storage/images/icon.png" />
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="storage/images/icon.png" />
        </div>
        <div class="card-info"> <span class="card-title">{{$another_profile->username}}</span>
 </div>

    </div>
   
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab"><i class="fa fa-bullhorn" aria-hidden="true"></i>
                <div class="hidden-xs">Posts</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <a type="button" id="following" class="btn btn-default" href="{{route('friends.index')}}" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i>
                <div class="hidden-xs">Friends</div>
            </a>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>posts</h3>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3 style="text-align:center" >{{$another_profile->first_name}} {{$another_profile->last_name}}</h3>
          <ul class="list-group">
  <li class="list-group-item">Email : {{$another_profile->email}}</li>
  <li class="list-group-item">Phone 1 : {{$another_profile->phone_number1}}</li>
  <li class="list-group-item">Phone 2 : {{$another_profile->phone_number2}}</li>
  <li class="list-group-item">Hometown : {{$another_profile->hometown}}</li>
  <li class="list-group-item">Gender : {{$another_profile->gender}}</li>
  <li class="list-group-item">Martial status : {{$another_profile->martial_status}}</li>
  
</ul>
        </div>
        <div class="tab-pane fade in" id="tab3">
        
        </div>
      </div>
    </div>
@else

{{--  authenticated user  --}}
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="storage/images/{{Auth::user()->image}}" />
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="storage/images/{{Auth::user()->image}}" />
        </div>
        <div class="card-info"> <span class="card-title">{{Auth::user()->username}}</span>

        </div>
    </div>
   
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab"><i class="fa fa-bullhorn" aria-hidden="true"></i>
                <div class="hidden-xs">Posts</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        {{--  friends of user   --}}
        <div class="btn-group" role="group">
            <a type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i>
                <div class="hidden-xs">Friends</div>
            </a>
        </div>
    </div>
        <div class="well">
      <div class="tab-content">
     {{--  posts of user  --}}
      
        <div class="tab-pane fade in active" id="tab1">
        @if(Auth::user()->posts)
            @foreach(Auth::user()->posts as $item)
              <ul  class="list-group">
             
  <li class="list-group-item"> 
  <div style="display:flex;border-bottom:1px solid gray" >
  <img style="height:100px" src="storage/images/{{$item->user->image}}" />
  <h4>{{$item->user->username}}</h4>
  </div>
      <div class = "thumbnail left">
         <img style="max-height:300px"  src = "storage/images/{{$item->image}}" >
      </div>
              
      <div class = "caption">
         <h5> {{$item->caption}} </h5>
         <p>
            <a href = "#" class = "btn btn-primary" role = "button">
               Button
            </a> 
         </p>
         
      </div>
  </li>
      
</ul>
            @endforeach
        @endif
        </div>
        {{--  user informations  --}}
        <div class="tab-pane fade in" id="tab2">
            <h3 style="text-align:center" >{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
          <ul class="list-group">
  <li class="list-group-item">Email : {{Auth::user()->email}}</li>
  <li class="list-group-item">Phone 1 : {{Auth::user()->phone_number1}}</li>
  <li class="list-group-item">Phone 2 : {{Auth::user()->phone_number2}}</li>
  <li class="list-group-item">Hometown : {{Auth::user()->hometown}}</li>
  <li class="list-group-item">Gender : {{Auth::user()->gender}}</li>
  <li class="list-group-item">Martial status : {{Auth::user()->martial_status}}</li>
  
</ul>
        </div>
        <div class="tab-pane fade in" id="tab3">
        <ul class="list-group">
        @if(Auth::user()->friends())
            @foreach(Auth::user()->friends() as $item)
                
  <li class="list-group-item">
  <img height="50px" src="storage/images/{{$item->image}}" />
  username : {{$item->username}}</li>
                
            @endforeach
        @endif
        </div>
      </div>
    </div>
    @endif
            
    
@endsection