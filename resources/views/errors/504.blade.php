

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
   <!--Title-->
	<title>Network Error</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">

	<meta name="keywords"content="">
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href="{{ asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>      
       <div class="authincation  fix-wrapper">
        <div class="container">
            <div class="row justify-content-center h-100 align-items-center">
               <div class="col-md-6">
					<div class="error-page">
						<div class="error-inner text-center">
							<div class="dz-error" data-text="504">504</div>
							<h2 class="error-head mb-0"><i class="fa fa-times-circle text-danger"></i>Network Error</h2>
							<p>Sorry, there was a problem with the network. Please try again later.</p>
							<a href="/" class="btn btn-secondary">BACK TO HOMEPAGE</a>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('admin/js/deznav-init.js') }}"></script>
<script src="{{ asset('admin/js/custom.min.js') }}"></script>
<script src="{{ asset('admin/js/demo.js') }}"></script>
<script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>
</body>
</html>