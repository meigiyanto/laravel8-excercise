@extends('layout.main')

@section('title', 'Edit Employee')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1 class="m-0">Edit Employee</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Edit Employee</li>
		</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid my-3">
	<div class="card">
		<div class="card-body">
			
			@if (count($errors) > 0)
			<div class="alert alert-danger">
			    <ul>
			        @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			        @endforeach
			    </ul>
			</div>
			@endif
			
			@foreach($employee as $e)
			<form action="/employee/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $e->Employee_id }}"> <br/>
				<div class="form-group">
					<lable>Nama</lable>
					<input type="text" required="required" name="nama" value="{{ $e->nama }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Pekerjaan</label>
					<input type="text" required="required" name="pekerjaan" value="{{ $e->pekerjaan }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" required="required" name="email" value="{{ $e->email }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="phone" required="required" name="telepon" value="{{ $e->telepon }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea required="required" name="alamat" class="form-control">{{ $e->alamat }}</textarea>
				</div>
				<button type="button" class="btn btn-sm btn-primary">Simpan</button>
				<a class="btn btn-sm btn-secondary float-right" href="/employee"> Kembali</a>
			</form>
			@endforeach
		</div>
	</div>
</div>
@endsection