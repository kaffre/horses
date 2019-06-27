@extends('backend.layout')
@section('content')
<form method="POST" action="/saveArticle">

	@csrf

	 <div class="form-group">
        <label class="sr-only" for="">Tytuł</label>
        <input name="name" value="" type="text" class="form-control" id="name" placeholder="Nazwa">
    </div>
    <div class="form-group">
        <label class="sr-only" for="">Treść artykułu</label>
        <textarea name="content" value="" type="text" class="form-control" id="content" placeholder="content"></textarea>
    </div>

    <div class="form-group">
        <input name="subbmit" value="" type="submit" id="saveArticle" ">
    </div>

</form>

@endsection