@extends('backend.layout')
@section('content')
	@foreach($categories as $category)
		<div class="category row" style="text-align: center;">    
			<div class="col-1">
				{{$category->id}}
			</div>   
			<div class="col-6">
				<span>{{$category->name}}</span>
			</div>   
			<div class="col-3">
			</div>   
			<div class="col-1">
				<p><a href="{{url('/'.Config::get('constants.admin.prefix').'/category/'.$category->id.'/edit')}}" class="btn btn-primary" role="button">Edytuj</a></p>
			</div>  
			<div class="col-1">
				<form action="{{ url('/'.Config::get('constants.admin.prefix').'/category', ['id' => $category->id]) }}" method="post">
				    <p><input class="btn btn-danger" type="submit" value="Usuń" /></p>
				    @method('delete')
				    @csrf
				</form>
			</div>  
		</div>
	@endforeach	

@endsection