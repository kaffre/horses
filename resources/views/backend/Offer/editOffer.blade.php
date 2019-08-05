@extends('backend.layout')
@section('content')
{{-- @dd($offer->content); --}}
<form method="POST" action="/offer/{{$offer->id}}" enctype="multipart/form-data" class="horsesForm" id="horsesForm">

{{method_field('PATCH')}}
	@csrf


    <div class="form-group">
        <label for="cateogryOffert">Kategoria</label>
        <select class="form-control" id="cateogryOffert" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}" 
                    {{$category->id === $offer->category_id ? 'selected': ''}}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">Nazwa Firmy</label>
        <input name="name" value="{{$offer->name}}" type="text" class="form-control" id="name" placeholder="Nazwa">
    </div>
    {{-- hidden jeżeli oferta pracy to widoczne w js --}}
     <div class="form-group">
        <label class="sr-only" for="">Stanowisko</label>
        <input name="position" value="{{$offer->position}}" type="text" class="form-control hidden" id="position" placeholder="Stanowisko">
    </div>
    {{-- hidden jeżeli oferta pracy to widoczne w js --}}

    
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Kraj</label>
            <input name="country" value="{{$offer->address->country}}" type="text" class="form-control" id="country" placeholder="country">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Miasto</label>
            <input name="city" value="{{$offer->address->city}}" type="text" class="form-control" id="city" placeholder="city">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Ulica</label>
            <input name="street" value="{{$offer->address->street}}" type="text" class="form-control" id="street" placeholder="street">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Numer budynku</label>
            <input name="number" value="{{$offer->address->number}}" type="text" class="form-control" id="number" placeholder="number">
        </div>
    </div>
     <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lat</label>
            <input name="lat" value="{{$offer->coordinate->lat}}" type="text" class="form-control" id="lat" placeholder="lat">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">lng</label>
            <input name="lon" value="{{$offer->coordinate->lon}}" type="text" class="form-control" id="lon" placeholder="lon">
        </div>
        <div class="form-group col-md-3">
            <button id="getCoordinate" class="getCoordinate" ">coordy</button>
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">Opis oferty pracy</label>
        <textarea name="content" type="text" class="form-control" id="description" placeholder="description">{{$offer->content}}</textarea>
    </div>
    <div class="form-group">
        <div class="row imagesInForm">
            @foreach($offer->image as $image)
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
        <input name="subbmit" value="" type="submit" id="editOffer" ">
    </div>

    <input type="hidden" name="action" id="action" value="{{config::get('constants.admin.ajax_offer')}}/{{$offer->id}}" />
    <div class="form-group deleteImages">
    </div>

</form>

@endsection