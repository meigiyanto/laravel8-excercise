@extends('layouts.main')

@section('title', 'Detail Employee')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Detail Employee</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Detail Employee</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<a class="mb-3 btn btn-sm btn-primary" href="/employee"> Back</a>
				<a class="float-right mb-3 btn btn-sm btn-secondary" href="/employee/edit/{{ $employee->id }}">Edit</a>
				<div class="row">
					<div class="col-md-8">
						<div class="table table-responsive">
							<table class="table table-striped table-bordered text-nowrap" style="width: 100%">
								<tr>
									<th>Full Name</th>
									<td>{{$employee->fullname}}</td>
					   		</tr>
								<tr>
									<th>Position</th>
									<td>{{ $employee->position }}</td>
					   		</tr>
								<tr>
									<th>Email</th>
									<td>{{ $employee->email }}</td>
					   		</tr>
								<tr>
									<th>Age</th>
									<td>{{ $employee->age }} Years Old</td>
					   		</tr>
								<tr>
									<th>Phone</th>
									<td>{{ $employee->phone }}</td>
					   		</tr>
								<tr>
									<th>Address</th>
									<td>{{ $employee->address }}</td>
					   		</tr>
							</table>
						</div>
					</div>
					<div class="col-md-4">
			   		<img class="img-fluid" src="/assets/images/{{ $employee->picture }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
