<!DOCTYPE html>
<html lang="en">

<head>
    <title>School Status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="images/profile/icon-spp.png" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="css/style.css">
    
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
