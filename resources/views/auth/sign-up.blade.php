<!DOCTYPE html>
<html lang="en">

<head>
	<title>Informatika Malam A</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset("images/profile/logo-univ.png") }}" type="image/x-icon">
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
						<img src="images/profile/logo-spp.png" alt="" class="img-fluid mb-4 w-50">
						<form action="/sign-up" method="POST">
							@csrf
							<h4 class="mb-3 f-w-800">SIGN UP</h4>
							<div class="form-group mb-4">
								<label class="floating-label" for="name"><i class="fas fa-user"></i>
									Name</label>
								<input type="text" class="form-control bg-transparent @error('name') is-invalid @enderror"
									name="name" value="{{ old('name') }}" id="name">
								@error('name')
								<x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
								@enderror
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="username"><i class="fas fa-at"></i>
									Username</label>
								<input type="text" class="form-control bg-transparent @error('username') is-invalid @enderror"
									name="username" value="{{ old('username') }}" id="username">
								@error('email')
								<x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
								@enderror
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="email"><i class="fas fa-envelope"></i>
									Email</label>
								<input type="text" class="form-control bg-transparent @error('email') is-invalid @enderror"
									name="email" value="{{ old('email') }}" id="email">
								@error('email')
								<x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
								@enderror
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="password"><i class="fas fa-lock"></i>
									Password</label>
								<input type="password" class="form-control bg-transparent @error('password') is-invalid @enderror"
									name="password" value="{{ old('password') }}" id="password">
								@error('password')
								<x-forms.invalid-feedback>{{ $message }}</x-forms.invalid-feedback>
								@enderror
							</div>
							<button type="submit" class="btn btn-block btn-primary mb-4">Sign Up</button>
						</form>
						<p class="mb-2">Already have an account? <a href="sign-in" class="f-w-400">Sign In</a></p>
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
