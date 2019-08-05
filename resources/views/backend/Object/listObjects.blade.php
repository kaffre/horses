@extends('backend.layout')
@section('content')
	@foreach($objects as $object)

		<div class="object row" style="text-align: center;">    
			<div class="col-1">
				{{$object->id}}
			</div>   
			<div class="col-2">
				<img src="{{$object->image->first()['name']}}" height="50" width="50"/>
			</div>   
			<div class="col-4">
				<span>{{$object->name}}</span>
			</div>   
			<div class="col-3">
			</div>   
			<div class="col-1">
				<p><a href="{{url('object/'.$object->id.'/edit')}}" class="btn btn-primary" role="button">Edytuj</a></p>
			</div>  
			<div class="col-1">
				<form action="{{ url('/object', ['id' => $object->id]) }}" method="post">
				    <p><input class="btn btn-danger" type="submit" value="Usuń" /></p>
				    @method('delete')
				    @csrf
				</form>
			</div>  
		</div>

	@endforeach	
@endsection