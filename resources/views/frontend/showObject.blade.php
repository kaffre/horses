@extends('frontend.layout')
@section('content')
<div class="row">
<div class="col-md-4">
	asdasd
</div>
<div class="col-md-8">
	<div class="object" style="text-align: center;"> 
	<h3>{{$object->name}}</h3> 
		<div class="images">
			<img class="img-responsive" src="{{$object->image->first()->name}}" height="400" width="400">
			<div class="images-thumbnails"> 
		    	@foreach($object->image as $image)
			    	<img class="img-responsive" src="{{$image->name}}" height="200" width="200">
		    	@endforeach
		    </div>
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
</div>
</div>
@endsection
