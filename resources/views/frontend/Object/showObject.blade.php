@extends('frontend.layout')
@section('content')

	<div class="object" style="text-align: center;"> 
	<h3>{{$object->name}}</h3> 
		<div class="gallery">
	    	@foreach($object->image as $image)
		    	<a href="{{$image->name}}"><img class="img-responsive" src="{{$image->name}}" height="200" width="200"></a>
	    	@endforeach
	    </div>    
	    <div class="caption">
	        <div class="address">
	        	<span>Adres: {{$object->address->city}}  {{$object->address->street}} {{$object->address->number}}</span>
	        </div>
	        <div class="description">
	        	 <p>{{str_limit($object->description, 100)}}</p>
	        </div>
	    </div>
	   
	    <p><a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-primary" role="button">Wróć</a></p>
	</div>	

@endsection
