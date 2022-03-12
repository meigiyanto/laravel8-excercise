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
					<li class="breadcrumb-item"><a href="employees">Employees</a></li>
					<li class="breadcrumb-item active">All Employees</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">

		@if(Session::get('success'))
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{{ Session::get('success') }}</strong>
			</div>
		@endif

		<div class="card">
			<div class="card-body">
				<a class="mb-3 btn btn-sm btn-secondary" href="/employees/create"> + Add New Employee</a>
				<a href="/employee/fprint" class="mb-3 btn btn-sm btn-primary" target="_blank">Print PDF</a>
				<form id="form-search" action="/employees">
					<div class="form-group">
						<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search employee ..">
						<button type="submit" class="mt-3 btn btn-sm btn-primary">Search</button>
					</div>
				</form>

				<div class="table table-responsive">
					<table class="table table-striped table-bordered text-nowrap">
						<tr class="text-center">
							<th>#</th>
							<th>Full Name</th>
					  	<th>Email</th>
							<th>Position</th>
							<th>Options</th>
						</tr>
						@php $i = $employee->currentPage() * $employee->perPage() - $employee->perPage() + 1; @endphp
						@foreach($employee as $e)
						<tr>
							<td class="text-center">{{ $i }}</td>
							<td>{{ $e->fullname }}</td>
							<td>{{ $e->email }}</td>
							<td>{{ $e->position }}</td>
							<td style="width: 15%;">
								<a class="btn btn-sm btn-info" href="/employees/{{ $e->id }}">Detail</a>								<a class="btn btn-sm btn-warning" href="/employees/{{ $e->id }}/edit">Edit</a>
								<form class="d-inline-block" action="/employees/{{ $e->id }}" method="post">
									@method('delete')
									@csrf
									<button class="btn btn-sm btn-danger">Hapus</button>
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

<script>
$(function() {
	$('#form-search').submit(function(e) {
		e.preventDefault();
		const keyword = $('#keyword').val();
		$.ajax({
			type: "get",
			url: "{{ url('employess/search') }}",
			success: function(message) {},
			error: function(xhr, thrownError) {
				alert(xhr.status+'\n'+xhr.responseText+'\n'+thrownError);
			}
		});
	});
});
</script>
@endsection
