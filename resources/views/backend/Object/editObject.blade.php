@extends('backend.layout')
@section('content')

<form method="POST" enctype="multipart/form-data" action="/object/{{$object->id}}" class="horsesForm">
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
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lat</label>
            <input name="lat" value="{{$object->coordinate->lat}}" type="text" class="form-control" id="lat" placeholder="lat">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lng</label>
            <input name="lon" value="{{$object->coordinate->lon}}" type="text" class="form-control" id="lon" placeholder="lon">
        </div>
        <div class="form-group col-md-3">
            <button id="getCoordinate" class="getCoordinate" ">coordy</button>
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">description</label>
        <input name="description" value="{{$object->description}}" type="text" class="form-control" id="description" placeholder="description">
    </div>

    <div class="form-group">
        <div class="row imagesInForm">
            @foreach($object->image as $image)
                <div class="col-md-3 divWithImage" id="imageDiv_{{$image->id}}_{{$image->imagetable_id}}">
                    {{-- <input name="input_img[]" type="file" class="form-control" id="image_0" style="display: none;"> --}}
                    <label for="image_{{$image->id}}_{{$image->imagetable_id}}">
                        <img id="inputimage_{{$image->id}}_{{$image->imagetable_id}}" src="{{$image->name}}" alt="your image" width="200" height="200" />
                    </label>
                    <button type="button" name="remove" id="{{$image->id}}_{{$image->imagetable_id}}" class="btn btn-danger btn_remove_update_page" image-database-id="{{$image->id}}">X</button>
                </div>
            @endforeach
        </div>
        <button type="button" name="addImage" id="addImage" class="btn btn-success">Add More</button>
    </div>

    <div class="form-group">
        <input name="subbmit" value="" type="submit" id="updateObject" ">
    </div>

    <input type="hidden" name="action" id="action" value="{{config::get('constants.admin.ajax_object')}}/{{$object->id}}" />

</form>
@endsection