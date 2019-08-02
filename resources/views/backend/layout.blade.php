<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/coordinate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/images.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/form.js') }}"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 menu">
                <a href="{{url(config::get('constants.admin.prefix').'/objects')}}" class="col-md-12">Obiekty</a>          
                <a href="{{url(config::get('constants.admin.prefix').'/offer')}}" class="col-md-12">Oferty</a>         
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
<div class="overlay"></div>
<div id="loading-img"><img src="{{asset('running_hors.gif')}}"/></div>
<style type="text/css">
    .overlay {
    background: #e9e9e9;  
    display: none;        
    position: absolute;   
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.5;
    }

    #loading-img {
        display: none;
    }

    #loading-img img {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
</style>
</body>
</html>