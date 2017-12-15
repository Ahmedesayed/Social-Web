@extends('layouts.app')

@section('content')

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
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i>
                <div class="hidden-xs">Friends</div>
            </button>
        </div>
    </div>
        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>posts</h3>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>profile</h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>friends</h3>
        </div>
      </div>
    </div>
    
            
    
@endsection