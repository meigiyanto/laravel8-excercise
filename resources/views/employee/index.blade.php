@extends('layouts.main')

@section('title', 'All Employees')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">All Employees</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">All Employees</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="content">
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
							<th>Full Name</th>
							<th>Position</th>
							<th>Options</th>
						</tr>
						@php $i = $employee->currentPage() * $employee->perPage() - $employee->perPage() + 1; @endphp
						@foreach($employee as $e)
						<tr>
							<td>{{ $i }}</td>
							<td>{{$e->fullname}}</td>
							<td>{{$e->position}}</td>
							<td style="width: 15%;">
								<a class="btn btn-sm btn-info" href="/employee/detail/{{ $e->id }}">Detail</a>								<a class="btn btn-sm btn-warning" href="/employee/edit/{{ $e->id }}">Edit</a>
								<form class="d-inline-block" action="/employee/destroy/{{ $e->id }}" method="post">
									@csrf
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" class="btn btn-sm btn-danger" name="_method">Hapus</button>
								</form>
							</td>
						</tr>
						@php $i++ @endphp
						@endforeach
					</table>
				</div>

				<p class="mt-3 float-right">Halaman : {{ $employee->currentPage() }} Jumlah Data : {{ $employee->total() }} Data Per Halaman : {{ $employee->perPage() }}</p>

				<p class="mt-2">{{ $employee->links() }}</p>
			</div>
		</div>
	</div>
</div>
@endsection
