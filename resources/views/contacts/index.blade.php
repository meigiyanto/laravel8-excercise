@extends('layouts.main')

@section('title', 'contact')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Data Contact</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Data Contact</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
        @if(session()->get('success'))
        	<div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
        <a href="{{ route('contacts.create')}}" class="mb-3 btn btn-sm btn-primary">New contact</a>
				<form action="/contact/search" method="GET">
					<div class="form-group">
						<input type="text" class="form-control" name="search" placeholder="Search contact .." value="{{ old('search') }}">
						<button type="submit" class="mt-3 btn btn-sm btn-primary">Search</button>
					</div>
				</form>

				<div class="table table-responsive">
					<table class="table table-striped table-bordered text-nowrap" style="width: 100%">
						<tr class="text-center">
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Job Title</th>
							<th>City</th>
							<th>Country</th>
							<th>Opsi</th>
						</tr>
						@php $i = $contacts->currentPage() * $contacts->perPage() - $contacts->perPage() + 1; @endphp
						@foreach($contacts as $contact)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{$contact->first_name}} {{$contact->last_name}}</td>
							<td>{{$contact->email}}</td>
							<td>{{$contact->job_title}}</td>
							<td>{{$contact->city}}</td>
							<td>{{$contact->country}}</td>
							<td>
								<a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-sm btn-primary">Edit</a>
								<form class="d-inline-block" action="route('contacts.destroy', $contact->id)">                	@csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger" type="submit">Delete</button>
								</form>
							</td>
						</tr>
						@endphp $i++
						@endforeach
					</table>
				</div>

				<p class="mt-3 float-right">Halaman : {{ $contacts->currentPage() }} Jumlah Data : {{ $contacts->total() }} Data Per Halaman : {{ $contacts->perPage() }}</p>

				<p class="mt-2">{{ $contacts->links() }}</p>
			</div>
		</div>
	</div>
</div>
@endsection
