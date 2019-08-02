@extends('frontend.layout')
@section('content')

<div class="row results">
	<div class="col-md-12">
		<div class="row">

			@if (count($searchResults) > 0)
			    @foreach ($searchResults as $result)

			        <div class="col-md-3 col-sm-6">
			            <div class="thumbnail">
			                <img class="img-responsive" src="{{$result->image->first()['name']  }}" height="200" width="200">
			                <div class="caption">
			                    <h3>{{$result->name}} <small>{{$result->street}}</small> </h3>
			                    <p>{{$result->content}}</p>
			                    <p><a href="{{url('result/'.$result->id)}}" class="btn btn-primary" role="button">Details</a></p>
			                </div>
			            </div>
				    </div>

			    @endforeach
			@else

				<div class="col-12">
					<span>Niestety nie udało się niczego odnaleźć</span>
				</div>

			@endif

		</div>
	</div>
</div>

@endsection
