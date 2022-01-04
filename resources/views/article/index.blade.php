@extends('layout.main')

@section('title', 'Article')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Article</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Article</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<div class="container-fluid">
	<div class="card">
		
		<div class="card-body">
			<h3 class="text-center">Eloquent One To Many Relationship</h3>
			<table class="mt-3 table table-bordered table-striped">
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