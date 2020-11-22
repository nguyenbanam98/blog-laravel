<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('shop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('shop/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('shop/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('shop/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('shop/js/html5shiv.js')}}"></script>
    <script src="{{asset('shop/js/respond.min.js')}}"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('shop/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('shop/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('shop/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('shop/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('shop/images/ico/apple-touch-icon-57-precomposed.png')}}">

    @stack('css')
</head><!--/head-->

<body>
    <!--/header-->
    @include('components.header')
	
    <!--/slider-->
    @include('components.slider')
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                    {{-- left-sidebar --}}
                    @include('components.left-sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
					
				</div>
			</div>
		</div>
	</section>
	
    <!--/Footer-->
    @include('components.footer')
	

  
    <script src="{{asset('shop/js/jquery.js')}}"></script>
	<script src="{{asset('shop/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('shop/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('shop/js/price-range.js')}}"></script>
    <script src="{{asset('shop/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('shop/js/main.js')}}"></script>

    @stack('scripts')
</body>
</html>