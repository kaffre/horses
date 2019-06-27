<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 menu">
                <a href="{{url('object')}}" class="col-md-12">Obiekty</a>          
                <a href="{{url('offer')}}" class="col-md-12">Oferty</a>         
                <a href="" class="col-md-12">dupa1</a>            
                <a href="" class="col-md-12">dupa2</a>            
            </div>
            <div class="col-md-11 content">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @yield('content')
            </div>
        </div>
        
    </div>

</body>
</html>