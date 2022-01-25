@extends('layout.main')

@section('title', 'Edit Pegawai')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Pegawai</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Pegawai</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid my-3">
	<div class="card">
		<div class="card-body">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
			    <ul>
			        @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			        @endforeach
			    </ul>
			</div>
			@endif

			@foreach($pegawai as $p)
			<form action="/pegawai/update/{{$p->id}}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
				<div class="form-group">
					<lable>Nama</lable>
					<input type="text" required="required" name="nama" value="{{ $p->nama }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<input type="text" required="required" name="jabatan" value="{{ $p->jabatan }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Umur</label>
					<input type="number" required="required" name="umur" value="{{ $p->umur }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea required="required" name="alamat" class="form-control">{{ $p->alamat }}</textarea>
				</div>
				<!-- <input type="submit" value="Simpan Data"> -->
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				<a class="btn btn-sm btn-secondary float-right" href="/pegawai"> Kembali</a>
			</form>
			@endforeach
		</div>
	</div>
</div>
@endsection