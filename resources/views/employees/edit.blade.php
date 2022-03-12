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
          <li class="breadcrumb-item">
            <a href="employee">Employee</a>
          </li>
          <li class="breadcrumb-item active">Edit Employee</li>
        </ol>
      </div>
	  </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card">
    <form action="/employees/{{ $employee->id }}" method="post" enctype="multipart/form-data">
			@method('put')
      @csrf
      <div class="card-body">
	      <div class="form-group">
  	      <label>Full Name</label>
    	    <input type="text"
						name="fullname"
						class="form-control @error('fullname') is-invalid @enderror"
						value="{{ old('fullname', $employee->fullname) }}"
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
								value="{{ old('position', $employee->position) }}"
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
								value="{{ old('age', $employee->age) }}"
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
								type="telp"
								name="phone"
								class="form-control @error('phone') is-invalid @enderror"
								value="{{ old('phone', $employee->phone) }}"
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
								value="{{ old('email', $employee->email) }}"
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
			      	<textarea name="address" rows="11" class="form-control @error('address') is-invalid @enderror">{{ old('address', $employee->address)  }}</textarea>
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
								<input type="hidden" name="oldpicture" value="{{ $employee->picture }}">
								<input type="file" name="picture" class="custom-file-input" id="picture" value="{{ $employee->picture }}">
								<label class="custom-file-label" for="picture">{{ $employee->picture }}</label>
							</div>
						</div>
					@if($employee->picture)
						<img class="img-fluid img-preview" src="{{ asset('storage/'. $employee->picture ) }}">
					@else
						<img class="img-fluid img-preview" src="{{ asset('assets/images/default-150x150.png') }}">
					@endif
					</div>
				</div>

        <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
        <a class="btn btn-sm btn-secondary float-right mt-2" href="/employees"> Back</a>

    	</form>
  	</div>
	</div>
</div>

<script>
const input = document.querySelector('.custom-file-input');
input.addEventListener('change', function() {

	const picture = document.querySelector('#picture');
	const pictureLabel = document.querySelector('.custom-file-label');
	const imgPreview   = document.querySelector('.img-preview');

	pictureLabel.textContent = picture.files[0].name;

	const filePicture = new FileReader();
	filePicture.readAsDataURL(picture.files[0]);
	filePicture.onload = function(e) {
		imgPreview.src = e.target.result;
	}
});
</script>
@endsection
