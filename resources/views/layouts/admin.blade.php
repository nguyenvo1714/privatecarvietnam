<!DOCTYPE html>
<html>
<head>
	<title>privatecarvietnam - @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" name="viewport"">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{!! Html::style('css/app.css') !!}
	{!! Html::style('css/font-awesome.min.css') !!}
	{!! Html::style('css/ionicons.min.css') !!}
	{!! Html::style('css/AdminLTE.min.css') !!}
	{!! Html::style('css/skins/_all-skins.min.css') !!}
	{!! Html::style('css/custom.AdminLTE.css') !!}
	{!! Html::style('css/morris.css') !!}
	{!! Html::style('css/jquery-jvectormap.css') !!}
	{!! Html::style('css/bootstrap-datepicker.min.css') !!}
	{!! Html::style('css/daterangepicker.css') !!}
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!-- header -->
		@include('layouts.header')

		<!-- main sidebar -->
		@include('layouts.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<!-- Main content -->
			@yield('content')

		</div>
		<!-- /.content-wrapper -->

		<!-- footer -->
		@include('layouts.footer')

		<!-- Control sidebar -->
		@include('layouts.control_sidebar')

	</div>

	{!! Html::script('js/app.js') !!}
	{!! Html::script('js/jquery-ui.min.js') !!}
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	{!! Html::script('js/raphael.min.js') !!}
	{!! Html::script('js/morris.min.js') !!}
	{!! Html::script('js/jquery.sparkline.min.js') !!}
	{!! Html::script('js/jquery-jvectormap-1.2.2.min.js') !!}
	{!! Html::script('js/jquery-jvectormap-world-mill-en.js') !!}
	{!! Html::script('js/jquery.knob.min.js') !!}
	{!! Html::script('js/moment.min.js') !!}
	{!! Html::script('js/daterangepicker.js') !!}
	{!! Html::script('js/bootstrap-datepicker.min.js') !!}
	{!! Html::script('js/bootstrap3-wysihtml5.all.min.js') !!}
	{!! Html::script('js/jquery.slimscroll.min.js') !!}
	{!! Html::script('js/fastclick.js') !!}
	{!! Html::script('js/adminlte.min.js') !!}
	{!! Html::script('js/dashboard.js') !!}
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
	<script>
		{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
	</script>
</body>
</html>