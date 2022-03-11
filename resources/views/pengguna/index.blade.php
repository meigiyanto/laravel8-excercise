@extends('layouts.main')

@section('title', 'Pengguna')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Penguna (One to One Relationship)</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pengguna</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div>
<!-- /.content-header -->

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
						<td>{{ $p->phone->nomor_telepon }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
