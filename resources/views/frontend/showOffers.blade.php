@extends('frontend.layout')
@section('content')

	<div class="row">

	    @foreach($offers as $offer)
	        <div class="col-md-3 col-sm-6">
	            <div class="thumbnail">
	                <img class="img-responsive" src="{{$offer->image->first()->name  }}" height="200" width="200">
	                <div class="caption">
	                    <h3>{{$offer->name}} <small>{{$offer->street}}</small> </h3>
	                    <p>{{$offer->content}}</p>
	                    <p><a href="{{url('offer/'.$offer->id)}}" class="btn btn-primary" role="button">Details</a></p>
	                </div>
	            </div>
		    </div>

	    @endforeach

	</div>

{{ $offers->links() }}

@endsection
