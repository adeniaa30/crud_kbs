<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ env('APP_NAME') }}</title>
	
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('vendors/core/core.css') }}">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
	<script src="{{ asset('vendors/inputmask/jquery.inputmask.min.js') }}"></script>

	<!-- end plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/fontawesome-free/css/all.min.css') }}">
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/backend/noble-ui/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
	<!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('assets/backend/noble-ui/css/demo_1/style.css') }}">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="{{ asset('assets/backend/noble-ui/images/favicon.png') }}" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@yield('header')
			</div>
		</div>
		<div class="d-flex justify-content-center">
			@yield('content')
		</div>
		<div class="row">
			<div class="col-md-12">
				@yield('footer')
			</div>
		</div>
	</div>
	<!-- core:js -->
	<script src="{{ asset('vendors/core/core.js') }}"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="{{ asset('vendors/chartjs/Chart.min.js') }}"></script>
	<script src="{{ asset('vendors/jquery.flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('vendors/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
	<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
	<script src="{{ asset('vendors/inputmask/jquery.inputmask.min.js') }}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/backend/noble-ui/js/template.js') }}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{ asset('assets/backend/noble-ui/js/dashboard.js') }}"></script>
	<script src="{{ asset('assets/backend/noble-ui/js/datepicker.js') }}"></script>
	<script src="{{ asset('assets/backend/noble-ui/js/inputmask.js') }}"></script>
	<!-- end custom js for this page -->

	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('assets/backend/js/page/components-table.js') }}"></script> 

	<script src="{{ asset('vendors/sweetalert2/sweetalert2.min.js') }}"></script>

	@include('components/_script_modal-delete')
	@yield('javascript')
</body>
</html>    