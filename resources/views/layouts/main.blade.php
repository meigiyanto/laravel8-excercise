<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="description" content="">
  <meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>My Laravel App</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- AdminLTE 3 CSS -->
	<link rel="stylesheet" href="{{ asset('/assets/css/adminlte.min.css') }}">

  <!-- jQuery -->
  <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/assets/js/adminlte.min.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layouts-fixed">
<div class="wrapper">

		<!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('/assets/images/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('layouts.section.navbar')

    @include('layouts.section.sidebar')

    <div class="content-wrapper">
      @yield('content')
    </div>
    @include('layouts.section.footer')

</div>
</body>
</html>
