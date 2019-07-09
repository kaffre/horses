<html>
<head>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 menu">
                <a href="{{url('object')}}" class="col-md-12">Obiekty</a>          
                <a href="{{url('offer')}}" class="col-md-12">Oferty</a>         
                <a href="{{url(Config::get('constants.admin.prefix').'/category')}}" class="col-md-12">Kategorie</a>            
                <a href="" class="col-md-12">dupa2</a>            
            </div>
           <div class="col-md-11 content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success">{{ session('success') }}</div>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        
    </div>

</body>
</html>