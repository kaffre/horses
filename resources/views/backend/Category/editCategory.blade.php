@extends('backend.layout')
@section('content')
<form method="POST" action="/category/{{$category->id}}">
{{method_field('PATCH')}}
	@csrf

	 <div class="form-group">
        <label class="sr-only" for=""></label>
        <input name="name"  type="text" class="form-control" id="name" value="{{$category->name}}" placeholder="Nazwa">
    </div>

       <div class="form-group">
        
        <input name="subbmit" value="Wyślij" type="submit" id="saveObject" ">
    </div>

</form>



@endsection