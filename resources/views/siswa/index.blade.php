@extends('layout.main')

@section('title', 'Siswa')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center">Siswa - Export & Import Laporan Excel Pada Laravel</h2>
</div>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			
			{{-- notifikasi form validasi --}}
			@if ($errors->has('file'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('file') }}</strong>
			</span>
			@endif
	
			{{-- notifikasi sukses --}}
			@if ($sukses = Session::get('sukses'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{ $sukses }}</strong>
			</div>
			@endif
			
			<!-- <h2 class="text-center">Siswa - Export & Import Laporan Excel Pada Laravel</h2> -->
			
			<a href="/siswa/export_excel" class="btn btn-sm btn-success my-3" target="_blank">Export to Excel</a>
			<!-- <a href="/siswa/import_excel" class="btn btn-sm btn-info" target="_blank">Import dari EXCEL</a> -->
			<button type="button" class="btn btn-sm btn-info mr-5" data-toggle="modal" data-target="#importExcel">
			Import from Excel
			</button>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIS</th>
						<th>Alamat</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1 @endphp
					@foreach($siswa as $s)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{$s->nama}}</td>
						<td>{{$s->nis}}</td>
						<td>{{$s->alamat}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
			<p><span>Halaman : {{ $siswa->currentPage() }}</span>
			<span>Jumlah Data : {{ $siswa->total() }}</span>
			<span>Data Per Halaman : {{ $siswa->perPage() }}</span></p>
			
			{{ $siswa->links() }}
			
		</div>
	</div>
</div>

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
				</div>
				<div class="modal-body">
	
					{{ csrf_field() }}
	
					<label>Pilih file excel</label>
					<div class="form-group">
						<input type="file" name="file" required="required">
					</div>
	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Import</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection