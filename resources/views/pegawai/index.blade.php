@extends('layout.main')

@section('title', 'Pegawai')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center">Data Pegawai</h1>
</div>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">

			<a class="mb-3 btn btn-sm btn-secondary" href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
			
			<form action="/pegawai/cari" method="GET">
			  <div class="form-group">
				<input type="text" class="form-control" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
				<button type="submit" class="mt-3 btn btn-sm btn-primary">Search</button>
			  </div>
			</form>
			

			<div class="table table-responsive">
				<table class="table table-striped table-bordered text-nowrap" style="width: 100%">
					<tr class="text-center">
						<th>#</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Umur</th>
						<th>Alamat</th>
						<th>Dibuat Pada</th>
						<th>Diubah Pada</th>
						<th>Opsi</th>
					</tr>
					<?php $i = $pegawai->currentPage() * $pegawai->perPage() - $pegawai->perPage() + 1; ?>
					@foreach($pegawai as $p)
					<tr>
						<td>{{ $i }}</td>
						<td>{{ $p->pegawai_nama }}</td>
						<td>{{ $p->pegawai_jabatan }}</td>
						<td>{{ $p->pegawai_umur }}</td>
						<td>{{ $p->pegawai_alamat }}</td>
						<td>{{ $p->created_at }}</td>
						<td>{{ $p->updated_at }}</td>
						<td>
							<a class="btn btn-sm btn-warning" href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
							<form class="d-inline-block" action="/pegawai/hapus/{{ $p->pegawai_id }}">
							  {{ csrf_field() }}
							  <input type="hidden" name="_method" value="DELETE">
							  <button type="submit" class="btn btn-sm btn-danger" name="_method">Hapus</button>
							</form>
						</td>
					</tr>
					<?php $i++ ?>
					@endforeach
				</table>
			</div>
			
			<p><span>Halaman : {{ $pegawai->currentPage() }}</span>
			<span>Jumlah Data : {{ $pegawai->total() }}</span>
			<span>Data Per Halaman : {{ $pegawai->perPage() }}</span></p>
			
			{{ $pegawai->links() }}
		</div>
	</div>
</div>
@endsection