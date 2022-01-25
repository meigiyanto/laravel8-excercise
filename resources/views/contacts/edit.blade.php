@extends('layout.main')

@section('title', 'Edit Contact')

@section('content')
<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Edit Contact</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Edit Contact</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="card">
		<form action="{{ route('contacts.update', $contact->id) }}" method="post">
            @method('PATCH') 
            @csrf	
			<div class="card-body">
				@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br /> 
                @endif
			
				<div class="form-group">    
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value={{ $contact->first_name }}/>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value={{ $contact->last_name }}/>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value={{ $contact->email }}/>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" name="city" value={{ $contact->city }}/>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" name="country" value={{ $contact->country }}/>
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title:</label>
                    <input type="text" class="form-control" name="job_title" value={{ $contact->job_title }}/>
                </div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				<a class="btn btn-sm btn-secondary float-right" href="/contact"> Kembali</a>
			</div>
		</form>
	</div>
</div>
@endsection