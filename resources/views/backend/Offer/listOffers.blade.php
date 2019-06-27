@extends('backend.layout')
@section('content')
	@foreach($offers as $offer)
		<div class="offer row" style="text-align: center;">    
			<div class="col-1">
				{{$offer->id}}
			</div>   
			<div class="col-2">
				<img src="{{$offer->image->first()->name}}" height="50" width="50"/>
			</div>   
			<div class="col-4">
				<span>{{$offer->name}}</span>
			</div>   
			<div class="col-3">
			</div>   
			<div class="col-1">
				<p><a href="{{url('offer/'.$offer->id.'/delete')}}" class="btn btn-primary" role="button">Edytuj</a></p>
			</div>  
			<div class="col-1">
				<form action="{{ url('/offer', ['id' => $offer->id]) }}" method="post">
				    <p><input class="btn btn-danger" type="submit" value="Usuń" /></p>
				    @method('delete')
				    @csrf
				</form>
			</div>  
		</div>
	@endforeach	

@endsection