@extends('layout.main')

@section('title', 'Notifikasi')

@section('content')
<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">

			<h2 class="text-center">Notifikasi Dengan Session Laravel</h2>

			@if ($message = Session::get('sukses'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if ($message = Session::get('gagal'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if ($message = Session::get('peringatan'))
			<div class="alert alert-warning alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{ $message }}</strong>
			</div>
			@endif


			<p class="text-center">
	            <a href="/notifikasi/sukses" class="btn btn-success">NOTIFIKASI SUKSES</a>
				<a href="/notifikasi/gagal" class="btn btn-danger">NOTIFIKASI GAGAL</a>
				<a href="/notifikasi/peringatan" class="btn btn-warning">NOTIFIKASI PERINGATAN</a>
			</p>
		</div>
	</div>
</div>
@endsection