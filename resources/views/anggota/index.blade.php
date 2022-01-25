@extends('layout.main')

@section('title', 'anggota')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1 class="m-0">Data Anggota (Many to Many Relationship)</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Data Anggota</li>
		</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container -->
</div>
<!-- /.content-header -->

<div class="content">
	<div class="container">
		<div class="card">
			<div class="card-body">
                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pengguna</th>
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
</div>
@endsection