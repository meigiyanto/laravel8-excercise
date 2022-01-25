@extends('layout.main')

@section('title', 'Upload File')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1 class="m-0">Upload File</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Upload File</li>
		</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
	<div class="card mb-3">
		<div class="card-body">
			<div class="row">
				
				<div class="col-lg-8 mx-auto">	
		
					@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
						{{ $error }} <br/>
						@endforeach
					</div>
					@endif
		
					<form action="/upload/proses" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
		
						<div class="form-group">
							<b>File Gambar</b><br/>
							<input type="file" name="file" multiple>
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
			<h3 class="text-center">Koleksi</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="1%">File</th>
						<th>Keterangan</th>
						<th width="1%">OPSI</th>
					</tr>
				</thead>
				<tbody>
				@foreach($picture as $p)
					<tr>
						<td><img width="150px" src="{{ url('assets/images/'.$p->file) }}"></td>
						<td class="align-middle">{{$p->keterangan}}</td>
						<td class="align-middle"><a class="btn btn-sm btn-danger" href="/upload/hapus/{{ $p->id }}">HAPUS</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection