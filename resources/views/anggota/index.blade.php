@extends('layout.main')

@section('title', 'Anggota')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center">Eloquent Many To Many Relationship</h2>
</div>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nama Anggota</th>
						<th>Hadiah</th>
						<th width="1%">Jumlah</th>
					</tr>
				</thead>
				<tbody>
					@foreach($anggota as $a)
					<tr>
						<td>{{ $a->nama }}</td>
						<td>
							<ul>
								@foreach($a->hadiah as $h)
								<li> {{ $h->nama_hadiah }} </li>
								@endforeach
							</ul>
						</td>
						<td class="text-center">{{ $a->hadiah->count() }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection