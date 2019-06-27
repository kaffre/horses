@extends('backend.layout')
@section('content')
<form method="POST" action="/offer" enctype="multipart/form-data">

	@csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            
            <input name="name" value="" type="text" class="form-control" id="name" placeholder="Nazwa">
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
        <input name="position" value="" type="text" class="form-control hidden" id="position" placeholder="Stanowisko">
    </div>
    {{-- hidden jeżeli oferta pracy to widoczne w js --}}

    
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Kraj</label>
            <input name="country" value="" type="text" class="form-control" id="country" placeholder="Kraj">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Miasto</label>
            <input name="city" value="" type="text" class="form-control" id="city" placeholder="city">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Ulica</label>
            <input name="street" value="" type="text" class="form-control" id="street" placeholder="street">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Numer budynku</label>
            <input name="number" value="" type="text" class="form-control" id="number" placeholder="number">
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">Opis oferty pracy</label>
        <textarea name="content" value="" type="text" class="form-control" id="content" placeholder="description"></textarea>
    </div>
    <div class="form-group">
        <input data-preview="#preview" name="input_img1" type="file" id="imageInput">
    </div>

    <div class="form-group">
        <input name="subbmit" value="Dodaj ofertę" type="submit" id="saveJobOffer" ">
    </div>

</form>

@endsection