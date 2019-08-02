<form method="GET" action="/search" enctype="multipart/form-data">
        <div class="row  align-self-center">
        	<div class="col-md-8">
	            <input name="city" type="text" class="form-control" id="city" placeholder="Wyszukaj">
	            <input name="type" type="text" class="form-control" id="type" value="{{$model}}" hidden>
	        </div>
	        <div class="col-md-2">
	        	  <input name="distance" type="number" min="0" max="50" value="10" class="form-control" id="distance" placeholder="Wyszukaj">
	        </div>
	        <div class="col-md-2">
		        <input name="subbmit" value="Wyszukaj" type="submit" id="search" ">
		    </div>
        </div>
</form>