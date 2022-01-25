@extends('layout.main')

@section('title', 'Student')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
	<div class="row mb-2">
		<div class="col-sm-6">
		<h1 class="m-0">Data Student</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Data Student</li>
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
				<a class="mb-3 btn btn-sm btn-secondary" href="/student/create"> + Add New student</a>
				
				<form action="/student/search" method="GET">
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="Search student .." value="{{ old('search') }}">
					<button type="submit" class="mt-3 btn btn-sm btn-primary">Search</button>
				</div>
				</form>

				<div class="table table-responsive">
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

                    <button type="button" class="btn btn-sm btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                        IMPORT EXCEL
                    </button>

                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="/student/import_excel" enctype="multipart/form-data">
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
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    
                    <a href="/student/export_excel" class="btn btn-sm btn-success my-3" target="_blank">EXPORT EXCEL</a>

                    <table class='table table-bordered'>
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
                            @foreach($student as $s)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$s->nama}}</td>
                                <td>{{$s->nis}}</td>
                                <td>{{$s->alamat}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
				
				<p><span>Halaman : {{ $student->currentPage() }}</span>
				<span>Jumlah Data : {{ $student->total() }}</span>
				<span>Data Per Halaman : {{ $student->perPage() }}</span></p>
				
				{{ $student->links() }}
			</div>
		</div>
	</div>
</div>
@endsection