@extends('frontend.layout')
@section('content')

	<div class="offer" style="text-align: center;">      
	    <div class="caption">
	        <h3>{{$offer->name}} <small>{{$offer->street}}</small> </h3>
	        <p>{{$offer->content}}</p>
	    </div>
	    <div class="gallery">
	    	@foreach($offer->image as $image)
		    	<a href="{{$image->name}}"><img class="img-responsive" src="{{$image->name}}" height="200" width="200"></a>
	    	@endforeach
	    </div>
	    <p><a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-primary" role="button">Wróć</a></p>
	</div>	

@endsection