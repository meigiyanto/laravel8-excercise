@extends('layout.main')

@section('title', 'Employee')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center">Data Employee</h1>
</div>

<div class="container-fluid">
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
							<a class="btn btn-sm btn-warning" href="/employee/edit/{{ $e->employee_id }}">Edit</a>
							<form class="d-inline-block" action="/employee/destroy/{{ $e->employee_id }}">
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
			
			<p><span>Halaman : {{ $employee->currentPage() }}</span>
			<span>Jumlah Data : {{ $employee->total() }}</span>
			<span>Data Per Halaman : {{ $employee->perPage() }}</span></p>
			
			{{ $employee->links() }}
		</div>
	</div>
</div>
@endsection