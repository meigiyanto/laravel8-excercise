@extends('layout.main')

@section('title', 'Upload File')

@section('content')
<style>
	dl, ol, ul {
		margin: 0;
		padding: 0;
		list-style: none;
	}
	.imgPreview img {
		padding: 8px;
		max-width: 160px;
	} 
</style>

<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Multiple Upload File</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item active">Multiple Upload File</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				
				<div class="col-lg-8 mx-auto">	
		
					<form action="/upload/proses" method="POST" enctype="multipart/form-data">
						@csrf

						@if ($message = Session::get('success'))
							<div class="alert alert-success">
								<strong>{{ $message }}</strong>
							</div>
						@endif

						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						
						<div class="user-image mb-3 text-center">
							<div class="imgPreview"> </div>
						</div>   
						
						<div class="form-group custom-file">
							<b>File Gambar</b><br/>
							<input type="file" class="custom-file-input" name="images[]" id="images" multiple accept="image/*">
							<label class="custom-file-label" for="images">Choose image</label>
						</div>
		
						<div class="form-group">
							<b>Keterangan</b>
							<textarea class="form-control" name="keterangan"></textarea>
						</div>
		
						<input type="submit" value="Upload" class="btn btn-sm btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
		
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center" width="20%">File</th>
						<th>Keterangan</th>
						<th class="text-center" width="10%">OPSI</th>
					</tr>
				</thead>
				<tbody>
				@php $i = $picture->currentPage() * $picture->perPage() - $picture->perPage() + 1; @endphp
				@foreach($picture as $p)
					<tr>
						<td><img width="150px" src="{{ url('assets/images/'.$p->name) }}"></td>
						<td class="align-middle">{{$p->keterangan}}</td>
						<td class="align-middle"><a class="btn btn-sm btn-danger" href="/upload/hapus/{{ $p->id }}">HAPUS</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		
			<p class="mt-3 float-right">Halaman : {{ $picture->currentPage() }} Jumlah Data : {{ $picture->total() }} Data Per Halaman : {{ $picture->perPage() }}</p>
				
			<p class="mt-2">{{ $picture->links() }}</p>
		</div>
	</div>
</div>

<script>
$(function() {
	var multiImgPreview = function(input, imgPreviewPlaceholder) {

		if (input.files) {
			var filesAmount = input.files.length;

			for (i = 0; i < filesAmount; i++) {
				var reader = new FileReader();

				reader.onload = function(event) {
					$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
				}

				reader.readAsDataURL(input.files[i]);
			}
		}

	};

	$('#images').on('change', function() {
		multiImgPreview(this, 'div.imgPreview');
	});
});    
</script>
@endsection