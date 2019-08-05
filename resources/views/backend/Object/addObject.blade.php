@extends('backend.layout')
@section('content')

<form method="POST" action="/object" enctype="multipart/form-data" class="horsesForm">

	@csrf

	 <div class="form-group">
        <label class="sr-only" for="">Nazwa</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name" placeholder="Nazwa">
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Kraj</label>
            <input name="country" value="{{ old('country') }}" type="text" class="form-control" id="country" placeholder="Kraj">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">City</label>
            <input name="city" value="{{ old('city') }}" type="text" class="form-control" id="city" placeholder="city">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">street</label>
            <input name="street" value="{{ old('street') }}" type="text" class="form-control" id="street" placeholder="street">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">number</label>
            <input name="number" value="{{ old('number') }}" type="text" class="form-control" id="number" placeholder="number">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lat</label>
            <input name="lat" value="{{ old('lat') }}" type="text" class="form-control" id="lat" placeholder="lat">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lon</label>
            <input name="lon" value="{{ old('lng') }}" type="text" class="form-control" id="lon" placeholder="lon">
        </div>
        <div class="form-group col-md-3">
            <button id="getCoordinate" class="getCoordinate" ">coordy</button>
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">description</label>
        <textarea name="description" class="form-control" id="description" placeholder="description">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <div class="row imagesInForm">
            <div class="col-md-3 divWithImage" id="imageDiv_0">
                <input name="input_img[]" type="file" id="image_0" style="display: none;">
                <label for="image_0">
                    <img id="inputimage_0" src="{{url('/uploadImage.png')}}" alt="your image" width="200" height="200" />
                </label>
                <button type="button" name="remove" id="0" class="btn btn-danger btn_remove">X</button>
            </div>
        </div>
        <button type="button" name="addImage" id="addImage" class="btn btn-success">Add More</button>
    </div>

    <div class="form-group">
        <input name="subbmit" value="Wyślij" type="submit" id="saveObject" ">
    </div>
    <input type="hidden" name="action" id="action" value="{{config::get('constants.admin.ajax_object')}}" />

</form>



@endsection('content')