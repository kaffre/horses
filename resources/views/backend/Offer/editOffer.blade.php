@extends('backend.layout')
@section('content')
{{-- @dd($offer->content); --}}
<form method="POST" action="/offer/{{$offer->id}}">

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
    <div class="form-group">
        <label class="sr-only" for="">Opis oferty pracy</label>
        <textarea name="content" type="text" class="form-control" id="description" placeholder="description">{{$offer->content}}</textarea>
    </div>

       <div class="form-group">
        
        <input name="subbmit" value="" type="submit" id="editOffer" ">
    </div>

</form>

@endsection