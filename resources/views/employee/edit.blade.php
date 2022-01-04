@extends('layout.main')

@section('title', 'Edit Karyawan')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center">Edit Karyawan</h2>
</div>

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
			
			@foreach($karyawan as $p)
			<form action="/karyawan/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->karyawan_id }}"> <br/>
				<div class="form-group">
					<lable>Nama</lable>
					<input type="text" required="required" name="nama" value="{{ $p->karyawan_nama }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<input type="text" required="required" name="jabatan" value="{{ $p->karyawan_jabatan }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Umur</label>
					<input type="number" required="required" name="umur" value="{{ $p->karyawan_umur }}" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea required="required" name="alamat" class="form-control">{{ $p->karyawan_alamat }}</textarea>
				</div>
				<button type="button" class="btn btn-primary">Simpan</button>
				<a class="btn btn-sm btn-secondary float-right" href="/karyawan"> Kembali</a>
			</form>
			@endforeach
		</div>
	</div>
</div>
@endsection