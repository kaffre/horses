@extends('frontend.layout')
@section('content')

	<div class="offer" style="text-align: center;">      
	    <div class="caption">
	        <h3>{{$offer->name}} <small>{{$offer->street}}</small> </h3>
	        <p>{{$offer->content}}</p>
	    </div>
	    <div class="images">
	    	@foreach($offer->image as $image)
		    	<img class="img-responsive" src="{{$image->name}}" height="200" width="200">
	    	@endforeach
	    </div>
	    <p><a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-primary" role="button">Wróć</a></p>
	</div>	

@endsection