@extends('layout.main')

@section('title', 'Pegawai')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pegawai</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pegawai</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">

			<a class="mb-3 btn btn-sm btn-secondary" href="/pegawai/create"> + Tambah Pegawai Baru</a>
			<form action="/pegawai/search" method="GET">
			  <div class="form-group">
				<input type="text" class="form-control" name="search" placeholder="Cari Pegawai .." value="{{ old('search') }}">
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
						<td>{{ $p->nama }}</td>
						<td>{{ $p->jabatan }}</td>
						<td>{{ $p->umur }}</td>
						<td>{{ $p->alamat }}</td>
						<td>{{ $p->created_at }}</td>
						<td>{{ $p->updated_at }}</td>
						<td>
							<a class="btn btn-sm btn-warning" href="/pegawai/edit/{{ $p->id }}">Edit</a>
							<form class="d-inline-block" action="/pegawai/hapus/{{ $p->id }}">
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
			
			<p class="mt-2">Halaman : {{ $pegawai->currentPage() }} <br>Jumlah Data : {{ $pegawai->total() }}<br>Data Per Halaman : {{ $pegawai->perPage() }}</p>
			
			{{ $pegawai->links() }}
		</div>
	</div>
</div>
@endsection