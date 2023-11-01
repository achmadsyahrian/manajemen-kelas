<!DOCTYPE html>
<html lang="en">

<head>
    <title>Informatika Malam A</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset("images/profile/logo-univ.png") }}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    
   {{-- Sweet Alert --}}
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body class="">
   {{-- Loader --}}
	@include('inc.loader')
   
   {{-- Navbar --}}
	@include('inc.navbar')

	<!-- [ Header ] start -->
	@include('inc.header')
	<!-- [ Header ] end -->
	
   {{-- Main Content --}}
   <div class="pcoded-main-container">
      <div class="pcoded-content">
         {{-- Page Header --}}
         @include('inc.page-header')

         {{-- Content --}}
         @yield('content')
      </div>
   </div>

<!-- Required Js -->
   @include('inc.script')
</body>

</html>
