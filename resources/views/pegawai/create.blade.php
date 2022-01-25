@extends('layout.main')

@section('title', 'Tambah Pegawai')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Pegawai</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Pegawai</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div>
<!-- /.content-header -->

<div class="container">
	<div class="card">
		<form action="/pegawai/store" method="post">
			{{ csrf_field() }}
	
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
			
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" @if(old('nama'))value="nama"@endif>
				</div>
				<div class="form-group">
					<label>Jabatan</label> 
					<input type="text" name="jabatan" class="form-control" @if(old('jabatan'))value="jabatan"@endif>
				</div>
				<div class="form-group">
					<label>Umur</label> 
					<input type="number" name="umur" class="form-control" @if(old('umur'))value="umur"@endif>
				</div>
				<div class="form-group">
					<label>Alamat</label> 
					<textarea name="alamat" class="form-control">@if(old('alamat')){{ alamat }}@endif</textarea>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				<a class="btn btn-sm btn-secondary float-right" href="/pegawai"> Kembali</a>
			</div>
		</form>
	</div>
</div>
@endsection