@extends('frontend.layout')
@section('content')

<div class="row offers">
	<div class="col-md-2">
		<ul>
			<li><a href="{{url('offer')}}"><span {{request()->route()->uri == 'offer' ? 'style=font-weight:bold;font-size:22px;' : '' }}>Wszystkie</span></a></li>
			@foreach($categories as $category)

				<li><a href="{{url('/category/'.$category->id.'/offers')}}"><span {{request()->route('id') == $category->id ? 'style=font-weight:bold;font-size:22px;' : '' }}>{{$category->name}}</span></a></li>

			@endforeach

		</ul>
	</div>
	<div class="col-md-10">
		<div class="row">

			@if (count ($offers) > 0)
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
			@else

				<div class="col-12">
					<span>Brak ofert w wybranej kategorii:(</span>
				</div>

			 @endif

		</div>
	</div>
</div>

{{ $offers->links() }}

@endsection
