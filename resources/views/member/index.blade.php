@extends('layout.main')

@section('title', 'Member')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1 class="m-0">Data Member</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Data Member</li>
		</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
	<div class="container-fluid">
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
                        @foreach($member as $m)
                        <tr>
                            <td>{{ $m->nama }}</td>
                            <td>
                                <ul>
                                    @foreach($m->reward as $h)
                                    <li> {{ $h->nama_reward }} </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-center">{{ $m->reward->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
</div>
@endsection