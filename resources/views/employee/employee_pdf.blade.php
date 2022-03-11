@extends('layouts.main')

@section('title', 'Karyawan')

@section('content')
<h5 class="text-center">Membuat Laporan PDF Dengan DOMPDF Laravel</h4>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Pekerjaan</th>
		</tr>
	</thead>
	<tbody>
		@php $i=1 @endphp
		@foreach($employee as $e)
		<tr>
			<td>{{ $i++ }}</td>
			<td>{{$e->nama}}</td>
			<td>{{$e->email}}</td>
			<td>{{$e->alamat}}</td>
			<td>{{$e->telepon}}</td>
			<td>{{$e->pekerjaan}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
