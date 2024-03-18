<!DOCTYPE html>
<html lang="en">

<head>
   <!--Title-->
   <title>404</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href="{{ asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }} rel="stylesheet">
    <link class="main-css" href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    
</head>

<body>
     <div class="authincation fix-wrapper">
        <div class="container">
            <div class="row justify-content-center h-100 align-items-center">
               <div class="col-md-6">
					<div class="error-page">
						<div class="error-inner text-center">
							<div class="dz-error" data-text="404">404</div>
							<h2 class="error-head mb-0"><i class="fa fa-exclamation-triangle text-warning me-2"></i>The page you were looking for is not found!</h2>
							<P>You may have mistyped the address or the page may have moved.</P>
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