@extends('backend.layout')
@section('content')

<form method="POST" action="/updateObject/{{$object->id}}">
{{method_field('PATCH')}}
	@csrf

	 <div class="form-group">
        <label class="sr-only" for="">Nazwa</label>
        <input name="name" value="{{$object->name}}" type="text" class="form-control" id="name" placeholder="Nazwa">
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">City</label>
            <input name="country" value="{{$object->address->country}}" type="text" class="form-control" id="country" placeholder="kraj">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">City</label>
            <input name="city" value="{{$object->address->city}}" type="text" class="form-control" id="city" placeholder="city">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">street</label>
            <input name="street" value="{{$object->address->street}}" type="text" class="form-control" id="street" placeholder="street">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">number</label>
            <input name="number" value="{{$object->address->number}}" type="text" class="form-control" id="number" placeholder="number">
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">description</label>
        <input name="description" value="{{$object->description}}" type="text" class="form-control" id="description" placeholder="description">
    </div>

       <div class="form-group">
        
        <input name="subbmit" value="" type="submit" id="updateObject" ">
    </div>

</form>
@endsection