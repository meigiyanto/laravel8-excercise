@extends('layout.main')

@section('title', 'Employee')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1 class="m-0">Data Employee</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Data Employee</li>
		</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container -->
</div>
<!-- /.content-header -->

<div class="content">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<a class="mb-3 btn btn-sm btn-secondary" href="/employee/create"> + Add New Employee</a>
				<a href="/employee/fprint" class="mb-3 btn btn-sm btn-primary" target="_blank">Print PDF</a>
				
				<form action="/employee/search" method="GET">
					<div class="form-group">
						<input type="text" class="form-control" name="search" placeholder="Search employee .." value="{{ old('search') }}">
						<button type="submit" class="mt-3 btn btn-sm btn-primary">Search</button>
					</div>
				</form>

				<div class="table table-responsive">
					<table class="table table-striped table-bordered text-nowrap" style="width: 100%">
						<tr class="text-center">
							<th>#</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>Pekerjaan</th>
							<th>Opsi</th>
						</tr>
						@php $i = $employee->currentPage() * $employee->perPage() - $employee->perPage() + 1; @endphp
						@foreach($employee as $e)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{$e->nama}}</td>
							<td>{{$e->email}}</td>
							<td>{{$e->alamat}}</td>
							<td>{{$e->telepon}}</td>
							<td>{{$e->pekerjaan}}</td>
							<td>
								<a class="btn btn-sm btn-warning" href="/employee/edit/{{ $e->id }}">Edit</a>
								<form class="d-inline-block" action="/employee/destroy/{{ $e->id }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-sm btn-danger" name="_method">Hapus</button>
								</form>
							</td>
						</tr>
						<?php $i++ ?>
						@endforeach
					</table>
				</div>
				
				<p class="mt-2">Halaman : {{ $employee->currentPage() }} Jumlah Data : {{ $employee->total() }} Data Per Halaman : {{ $employee->perPage() }}</p>
				
				{{ $employee->links() }}
			</div>
		</div>
	</div>
</div>
@endsection