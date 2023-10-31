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
						<img src="images/profile/logo-spp.png" alt="" class="img-fluid mb-4 w-50">
						<h4 class="mb-3 f-w-400">Sign Up</h4>
						<div class="form-group mb-4">
							<label class="floating-label" for="Email">Username</label>
							<input type="text" class="form-control" id="Email" placeholder="">
						</div>
						<div class="form-group mb-5">
							<label class="floating-label" for="Password">Password</label>
							<input type="password" class="form-control" id="Password" placeholder="">
						</div>
						<button class="btn btn-block btn-primary mb-4">Sign Up</button>
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