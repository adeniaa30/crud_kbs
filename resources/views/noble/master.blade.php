<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ env('APP_NAME') }}</title>
	
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('vendors/core/core.css') }}">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">

	<!-- end plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/fontawesome-free/css/all.min.css') }}">
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('vendors/noble-ui/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
	<!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('vendors/noble-ui/css/demo_1/style.css') }}">
	<!-- End layout styles -->
	<link rel="icon" href="{{ asset('images/bali-movement.jpeg') }}" type="image/x-icon"/>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/bali-movement.jpeg') }}" />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

	<style>
		.select2-container--default .select2-selection--single {
			height: 35px !important;
		}
	</style>

	@yield('css')
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">
		
		<!-- partial:partials/_sidebar.html -->
		@include('noble::_partials.sidebar')
		<!-- partial -->
		
		<div class="page-wrapper">
			<!-- partial:partials/_navbar.html -->
			@include('noble::_partials.navbar')
			<!-- partial -->
			
			<div class="page-content">
				
				@yield('content-header')
				
				@yield('content')
				
				
			</div>
			
			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://diskominfos.baliprov.go.id/" target="_blank">Diskominfos Provinsi Bali</a>. All rights reserved</p>
			</footer>
			<!-- partial -->
			
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
	<script src="{{ asset('vendors/noble-ui/js/template.js') }}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{ asset('vendors/noble-ui/js/dashboard.js') }}"></script>
	<script src="{{ asset('vendors/noble-ui/js/datepicker.js') }}"></script>
	<script src="{{ asset('vendors/noble-ui/js/inputmask.js') }}"></script>
	<!-- end custom js for this page -->

	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	{{-- <script src="{{ asset('vendors/js/page/components-table.js') }}"></script>  --}}

	<script src="{{ asset('vendors/sweetalert2/sweetalert2.min.js') }}"></script>

	{{-- @include('components/_script_modal-delete') --}}
	@yield('js')

</body>
</html>    