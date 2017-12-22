 @extends('layouts.app') @section('content') {{-- home page and timeline --}}
<div class="panel-body">

	<div style="margin-top:-30px" class="panel panel-default">
		<div class="panel-heading"> Add a new post</div>

		<div class="panel-body">
			<form class="form-horizontal" method="POST" method="post" enctype="multipart/form-data" action="{{route('posts.post')}}">
				{{ csrf_field() }} {{-- adding posts --}}

				<div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">

					<div class="col-md-15">
						<textarea id="caption" type="text" placeholder="Add your status" class="form-control" name="caption" value="" autofocus></textarea>

					</div>
				</div>


				<div class="form-group">
					<label for="image" class="col-md-4 control-label">Image</label>

					<div class="col-md-6">
						<input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Add
						</button>
					</div>


				</div>

			</form>

		</div>

	</div>
	{{-- retriving posts --}} 
    @if(count($posts)>0)
     @foreach($posts as $item)
	<ul class="list-group">

		<li class="list-group-item">
			<div style="display:flex;border-bottom:1px solid gray">
				<img height="100px" src="storage/images/{{$item->user->image}}" />
				<h4>{{$item->user->username}}</h4>
			</div>
			<div class="thumbnail left">
				<img style="max-height:300px" src="storage/images/{{$item->image}}">
			</div>

			<div class="caption">
				<h5> {{$item->caption}} </h5>
				<p>
					<a href="#" class="btn btn-primary" role="button">
						Button
					</a>
				</p>

			</div>
		</li>

	</ul>

	@endforeach @endif

</div>
</div>
</div>

</div>

</div>
@endsection