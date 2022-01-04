@extends('layout.main')

@section('title', 'Kontol Proses')

@section('content')
<div class="jumbotron mt-5">
	<h2 class="text-center">Kontol - Proses</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h3>www.malasngoding.com</h3>
                    <h3 class="my-4">Data Yang Di Input : </h3>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <td style="width:150px">Nama</td>
                            <td>{{ $data->nama }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>{{ $data->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td>Usia</td>
                            <td>{{ $data->usia }}</td>
                        </tr>
                    </table>

                    <a href="/input" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection