<!DOCTYPE html>
<html lang="en">

<head>
	<title>School Status</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="images/profile/icon-spp.png" type="image/x-icon">
	<!-- vendor css -->
	<link rel="stylesheet" href="css/style.css">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
                  {{-- <button class="btn  btn-primary" onclick="$('.toast-5s').toast('show')">5 sec</button> --}}
						<img src="images/profile/logo-spp.png" alt="" class="img-fluid mb-4 w-50">
                  <form action="/sign-in" method="POST">
                     @csrf
						   <h4 class="mb-3 f-w-800">SIGN IN</h4>
                     @if (session()->has('login-failed'))
                        <x-alert type="danger">{{ session('login-failed') }}</x-alert>
                     @endif
                     @if (session()->has('sign-out-success'))
                        <x-alert type="success">{{ session('sign-out-success') }}</x-alert>
                     @endif
                     <div class="form-group mb-4">
                        <label class="floating-label" for="Username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="Username" name="username" autocomplete="off">
                        @error('username')
                           <div class="invalid-feedback text-left">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="form-group mb-5">
                        <label class="floating-label" for="Password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password" name="password">
                        @error('password')
                           <div class="invalid-feedback text-left">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <button class="btn btn-block btn-primary mb-4">Sign In</button>
                  </form>
						<p class="mb-0 text-muted">Don't have an account? <a href="sign-up" class="f-w-400">Sign Up</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

{{-- Script --}}
@include('inc.script')

</body>

</html>
