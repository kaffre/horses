@extends('backend.layout')
@section('content')
<form method="POST" action="/updateArticle/{{$article->id}}">
{{method_field('PATCH')}}
	@csrf

	 <div class="form-group">
        <label class="sr-only" for="">Tytuł</label>
        <input name="name" value="{{$article->title}}" type="text" class="form-control" id="name" placeholder="Nazwa">
    </div>
    <div class="form-group">
        <label class="sr-only" for="">Treść artykułu/label>
        <textarea name="description" value="{{$article->content}}" type="text" class="form-control" id="description" placeholder="description"></textarea>
    </div>

       <div class="form-group">
        
        <input name="subbmit" value="" type="submit" id="updateArticle" ">
    </div>

</form>
@endsection