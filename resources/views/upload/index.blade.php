@extends('layout.main')

@section('title', 'Upload File')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center mx-auto">Upload File</h2>
</div>

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
							<input type="file" name="file">
						</div>
		
						<div class="form-group">
							<b>Keterangan</b>
							<textarea class="form-control" name="keterangan"></textarea>
						</div>
		
						<input type="submit" value="Upload" class="btn btn-primary">
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
				@foreach($gambar as $g)
					<tr>
						<td><img width="150px" src="{{ url('assets/images/'.$g->file) }}"></td>
						<td class="align-middle">{{$g->keterangan}}</td>
						<td class="align-middle"><a class="btn btn-danger" href="/upload/hapus/{{ $g->id }}">HAPUS</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection