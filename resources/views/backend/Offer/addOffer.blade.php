@extends('backend.layout')
@section('content')
<form method="POST" class="horsesForm" action="/offer" enctype="multipart/form-data">

	@csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            
            <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name" placeholder="Nazwa">
        </div>
        <div class="form-group col-md-6">
           
            <select class="form-control" name='category_id' id="cateogryOffert">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- hidden jeżeli oferta pracy to widoczne w js --}}
     <div class="form-group">
        <label class="sr-only" for="">Stanowisko</label>
        <input name="position" value="{{ old('position') }}" type="text" class="form-control hidden" id="position" placeholder="Stanowisko">
    </div>
    {{-- hidden jeżeli oferta pracy to widoczne w js --}}

    
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Kraj</label>
            <input name="country" value="{{ old('country') }}" type="text" class="form-control" id="country" placeholder="Kraj">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Miasto</label>
            <input name="city" value="{{ old('city') }}" type="text" class="form-control" id="city" placeholder="city">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Ulica</label>
            <input name="street" value="{{ old('street') }}" type="text" class="form-control" id="street" placeholder="street">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Numer budynku</label>
            <input name="number" value="{{ old('number') }}" type="text" class="form-control" id="number" placeholder="number">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lat</label>
            <input name="lat" value="{{ old('lat') }}" type="text" class="form-control" id="lat" placeholder="lat">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lng</label>
            <input name="lon" value="{{ old('lng') }}" type="text" class="form-control" id="lon" placeholder="lon">
        </div>
        <div class="form-group col-md-3">
            <button id="getCoordinate" class="getCoordinate" ">coordy</button>
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">Opis oferty pracy</label>
        <textarea name="content" type="text" class="form-control" id="content" placeholder="description">{{ old('content') }}</textarea>
    </div>
    <div class="form-group">
        <div class="row imagesInForm">
            <div class="col-md-3 divWithImage" id="imageDiv_0">
                <input name="input_img[]" type="file" class="form-control" id="image_0" style="display: none;">
                <label for="image_0">
                    <img id="inputimage_0" src="{{url('/uploadImage.png')}}" alt="your image" width="200" height="200" />
                </label>
                <button type="button" name="remove" id="0" class="btn btn-danger btn_remove">X</button>
            </div>
        </div>
        <button type="button" name="addImage" id="addImage" class="btn btn-success">Add More</button>
    </div>

    <div class="form-group">
        <input name="subbmit" value="Dodaj ofertę" type="submit" id="saveJobOffer" ">
    </div>
    <input type="hidden" name="action" id="action" value="{{config::get('constants.admin.ajax_offer')}}" />

</form>

@endsection