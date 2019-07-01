@extends('backend.layout')
@section('content')
<form method="POST" action="/{{Config::get('constants.admin.prefix')}}/category">

	@csrf

	 <div class="form-group">
        <label class="sr-only" for="">cc</label>
        <input name="name"  type="text" class="form-control" id="name" placeholder="Nazwa">
    </div>

       <div class="form-group">
        
        <input name="subbmit" value="Wyślij" type="submit" id="saveObject" ">
    </div>

</form>



@endsection