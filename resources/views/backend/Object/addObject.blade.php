@extends('backend.layout')
@section('content')

<form method="POST" action="/object" enctype="multipart/form-data">

	@csrf

	 <div class="form-group">
        <label class="sr-only" for="">Nazwa</label>
        <input name="name" value="{{ old('username') }}" type="text" class="form-control" id="name" placeholder="Nazwa">
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label class="sr-only" for="">Kraj</label>
            <input name="country" value="{{ old('username') }}" type="text" class="form-control" id="country" placeholder="Kraj">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">City</label>
            <input name="city" value="{{ old('username') }}" type="text" class="form-control" id="city" placeholder="city">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">street</label>
            <input name="street" value="{{ old('username') }}" type="text" class="form-control" id="street" placeholder="street">
        </div>
        <div class="form-group col-md-3">
            <label class="sr-only" for="">number</label>
            <input name="number" value="{{ old('username') }}" type="text" class="form-control" id="number" placeholder="number">
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="">description</label>
        <textarea name="description" value="{{ old('description') }}" class="form-control" id="description" placeholder="description"></textarea> 
    </div>

    <div class="form-group">
        <input data-preview="#preview" value="{{ old('input_img1') }}" name="input_img1" type="file" id="imageInput">
        <input data-preview="#preview" name="input_img2" type="file" id="imageInput">
    </div>

       <div class="form-group">
        
        <input name="subbmit" value="Wyślij" type="submit" id="saveObject" ">
    </div>

</form>



@endsection('content')