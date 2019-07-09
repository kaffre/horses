<html>
<head>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
</head>
<body>
	<div class="header">
		<div class="main-header container row">
			<div class="logo col-md-4">
				<img src="{{ url('/logo.png') }}" height="75px"/>
			</div>
			<div class="menu col-md-8">
				<a href="{{url('/object') }}">Obiekty</a>
				<a href="{{url('/offer') }}">Oferty</a>
				<a href="{{url('/blog') }}">Blog</a>
				<a href="#">Kontakt</a>
			</div>
		</div>
	</div>

    <div class="container">
        @if (session('error'))
            <div class="col-md-12">
                <div class="alert alert-danger">{{ session('error') }}</div>
            </div>
        @endif
        @if (session('success'))
	        <div class="col-md-12">
		        <div class="alert alert-success">{{ session('success') }}</div>
		    </div>
        @endif

        <div class="content">
        	@yield('content')
        </div>
    </div>
        
    <div class="footer">
    	
    </div>

</body>
</html>

<style>

html {
  height: 100%;
  box-sizing: border-box;
}

body {
	position: relative;
	  margin: 0;
  padding-bottom: 15rem;
  min-height: 100%;
}

.header {
	background: #151515;
	height: 75px; 
	margin-bottom: 20px;
}
.header .main-header {
	margin-left: auto;
	margin-right: auto;
}

.header .menu {
	text-align: right;
	margin-top: 21.5px;
}

.header .menu a {
	text-decoration: none;
	color: white;
	margin-left: 20px;
	margin-right: 20px;
	text-transform: uppercase;
}

.header .menu a:hover {
	color: gold;
}

.content {
	position: relative;
	text-align: center;
}

.footer {
	background: #151515;
	height: 200px;
	position: absolute;
	right: 0;
    left: 0;
    bottom: 0;
    padding: 1rem;
}

</style>
