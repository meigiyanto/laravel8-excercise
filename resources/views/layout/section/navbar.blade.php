<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Catatan Kecilku</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/pegawai') }}">Pegawai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/pengguna') }}">Pengguna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/anggota') }}">Anggota</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/article') }}">Article</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/upload') }}">Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/karyawan') }}">Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/siswa') }}">Siswa</a>
      </li>
  </div>
</nav>