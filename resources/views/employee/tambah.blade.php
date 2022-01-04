@extends('layout.main')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center">Tambah Data Karywan</h2>
</div>

<div class="container-fluid">
	<div class="card">
		<form action="/karyawan/store" method="post">
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
				<a class="btn btn-sm btn-secondary float-right" href="/karyawan"> Kembali</a>
			</div>
		</form>
	</div>
</div>
@endsection