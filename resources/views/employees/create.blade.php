@extends('layouts.main')

@section('title', 'Create New Employee')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Create New Employee</h1>
      </div>

      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="employee">Employee</a>
          </li>
          <li class="breadcrumb-item active">Create New Employee</li>
        </ol>
      </div>
		</div>
  </div>
</div>

<div class="container-fluid">
  <div class="card">
    <form action="{{ url('/employees') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
	      <div class="form-group">
  	      <label>Full Name *</label>
    	    <input type="text"
						name="fullname"
						class="form-control @error('fullname') is-invalid @enderror"
				  	value="{{ old('fullname') }}">
						@error('fullname')
						<div class="invalid-feedback" role="alert">
							<span>{{ $message }}</span>
						</div>
						@enderror
				</div>

      	<div class="row">
        	<div class="col-md-6">
         		<div class="form-group">
							<label>Position *</label>
           		<input
					 	 		type="text"
								name="position"
								class="form-control @error('position') is-invalid @enderror"
								value="{{ old('position') }}"
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
	            <label>Age *</label>
	            <input
								type="number"
								name="age"
								class="form-control @error('age') is-invalid @enderror"
								value="{{ old('age') }}"
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
              <label>Phone *</label>
              <input
								type="text"
								name="phone"
								class="form-control @error('phone') is-invalid @enderror"
								value="{{ old('phone') }}"
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
              <label>Email *</label>
              <input
								type="email"
								name="email"
								class="form-control @error('email') is-invalid @enderror"
								value="{{ old('email') }}"
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
					<div class="col-md-7">
				  	<div class="form-group">
			      	<label>Address *</label>
			      	<textarea name="address" rows="10" class="form-control"></textarea>
			      </div>
	        </div>

					<div class="col-md-5">
						<div class="form-group">
							<label class="custom-label" for="picture">Picture</label>
							<div class="custom-file">
								<input
									type="file"
									name="picture"
									class="custom-file-input"
				 	  			id="picture"
								>
								<label class="custom-file-label" for="picture">Choose file</label>
							</div>
						</div>
						<img class="img-fluid img-preview" src="{{ asset('assets/images/default-150x150.png') }}">
					</div>
				</div>

        <button type="submit" class="btn btn-sm btn-primary mt-3">Create</button>
        <a class="btn btn-sm btn-secondary float-right mt-3" href="/employee"> Back</a>

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
