@extends('layout.main')

@section('title', 'Article')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center my-4">Eloquent One To Many Relationship</h2>
</div>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Judul Article</th>
						<th>Tag</th>
						<th width="15%" class="text-center">Jumlah Tag</th>
					</tr>
				</thead>
				<tbody>
					@foreach($artikel as $a)
					<tr>
						<td>{{ $a->judul }}</td>
						<td>
							@foreach($a->tags as $t)
								{{$t->tag}},
							@endforeach
						</td>
						<td class="text-center">{{ $a->tags->count() }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection