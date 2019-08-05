@extends('frontend.layout')
@section('content')
@csrf
	@include('frontend.search.search', ['model' => $model])
	<div class="row">
	    @foreach($objects as $object)

	        <div class="col-md-3 col-sm-6">
	            <div class="thumbnail">
	                <img class="img-responsive" src="{{$object->image->first()['name']}}" height="200" width="200">
	                <div class="caption">
	                    <h3>{{$object->name}} <small>{{$object->street}}</small> </h3>
	                    <p>{{$object->description}}</p>
	                    <p><a href="{{url('object/'.$object->id)}}" class="btn btn-primary" role="button">Details</a></p>
	                </div>
	            </div>
		    </div>

	    @endforeach

	</div>



{{ $objects->links() }}

@endsection
