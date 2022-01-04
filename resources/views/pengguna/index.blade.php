@extends('layout.main')

@section('title', 'Pengguna')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center my-4">Eloquent One To One Relationship</h2>
</div>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Pengguna</th>
						<th>Nomor Telepon</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pengguna as $p)
					<tr>
						<td>{{ $p->nama }}</td>
						<td>{{ $p->telepon->nomor_telepon }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection