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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{ route('post.login') }}" method="post"">
                            @csrf
                            <input type="email" name="email" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Password" />
                            
							<span>
								<input name="rememberme" type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{route('post.register')}}" method="post">
                            @csrf
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
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