@extends('layouts.main')

@section('title', 'Edit Employee')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Employee</h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Edit Employee</li>
        </ol>
      </div>
	  </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card">
		@foreach($employee as $e)
    <form action="/employee/update/{{ $e->id }}" method="post">
       @csrf

      <div class="card-body">
	      <div class="form-group">
  	      <label>Full Name</label>
    	    <input type="text"
						name="fullname"
						class="form-control @error('fullname') is-invalid @enderror"
						value="{{ $e->fullname }}"
					>
					@error('fullname')
						<div class="invalid-feedback" role="alert">
							<span>{{ $message }}</span>
						</div>
					@enderror
				</div>

      	<div class="row">
        	<div class="col-md-6">
         		<div class="form-group">
							<label>Position</label>
           		<input
								type="text"
		 						name="position"
								class="form-control @error('position') is-invalid @enderror"
								value="{{ $e->position }}"
		 			 		>
							@error('position')
							<div class="invalid-feedback" role="alert">
								<span>{{ $message }}</span>
							</div>
							@enderror
         		</div>
        	</div>

        	<div class="col-md-6">
        		<div class="form-group">
	            <label>Age</label>
	            <input
								type="number"
								name="age"
								class="form-control @error('age') is-invalid @enderror"
								value="{{ $e->age }}"
							>
							@error('age')
							<div class="invalid-feedback" role="alert">
								<span>{{ $message }}</span>
							</div>
							@enderror
        		</div>
        	</div>
				</div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Phone</label>
              <input
								type="text"
								name="phone"
								class="form-control @error('phone') is-invalid @enderror"
								value="{{ $e->phone }}"
							>
							@error('phone')
							<div class="invalid-feedback" role="alert">
								<span>{{ $message }}</span>
							</div>
							@enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input
								type="email"
								name="email"
								class="form-control @error('email') is-invalid @enderror"
								value="{{ $e->email }}"
							>
							@error('email')
							<div class="invalid-feedback" role="alert">
								<span>{{ $message }}</span>
							</div>
							@enderror
           </div>
         </div>
      </div>

				<div class="row">
					<div class="col-md-6">
				  	<div class="form-group">
			      	<label>Address</label>
			      	<textarea name="address" rows="10" class="form-control @error('address') is-invalid @enderror">{{ $e->address  }}</textarea>
							@error('address')
							<div class="invalid-feedback" role="alert">
								<span>{{ $message }}</span>
							</div>
							@enderror
			      </div>
	        </div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="custom-label" for="picture">Picture</label>
							<div class="custom-file">
								<input type="file" name="picture" class="custom-file-input" id="picture" value="{{ $e->picture }}">
								<label class="custom-file-label" for="picture">{{ $e->picture }}</label>
							</div>
						</div>
						<img class="img-fluid img-preview" src="{{ asset('assets/images/'. $e->picture ) }}">
					</div>
				</div>

        <button type="submit" class="btn btn-sm btn-primary">Save</button>
        <a class="btn btn-sm btn-secondary float-right" href="/employee"> Back</a>

    	</form>
			@endforeach
  	</div>
	</div>
</div>
@endsection
