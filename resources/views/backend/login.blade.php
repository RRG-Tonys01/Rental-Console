<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="/css/backend/util.css">
	<link rel="stylesheet" type="text/css" href="/css/backend/main.css">
	<link href="/css/sb-admin-2.min.css" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="/verify" class="login100-form validate-form" method="post">
          @csrf
					<span class="login100-form-title p-b-34">
						Admin Login
					</span>

					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Email Empty">
						<input id="first-name" class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Password Empty">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					{!! NoCaptcha::display() !!}
					@error('g-recaptcha-response')
					<div class="alert alert-danger">
						{{$message}}
					</div>
					@enderror
					@if(session('status'))
							<div class="alert alert-danger">
									{{ session('status') }}
							</div>
					@endif
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
					</div>

				</form>

				<div class="login100-more" style="background-image: url({{ asset('image/house.svg') }});"></div>
			</div>
		</div>
	</div>
	{!! NoCaptcha::renderJs() !!}
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="/js/backend/login.js"></script>

</body>
</html>
