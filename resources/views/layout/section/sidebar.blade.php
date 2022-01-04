<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-sm-start fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 mr-auto" href="#">Catatan Kecilku</a>
    <button class="navbar-toggler align-self-start" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse bg-dark p-3 p-lg-0 mt-5 mt-lg-0 d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end mobileMenu" id="navbarSupportedContent">
      <ul class="navbar-nav align-self-stretch">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}"
            >Home <span class="sr-only">(current)</span></a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            href="{{ url('/pegawai') }}"
            tabindex="-1"
            aria-disabled="true"
            >CRUD</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            href="{{ url('/upload') }}"
            tabindex="-2"
            aria-disabled="true"
            >Upload Image</a
          >
        </li>
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            Relation
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/pengguna') }}">One to One</a>
            <a class="dropdown-item" href="{{ url('/article') }}">One to Many</a>
            <a class="dropdown-item" href="{{ url('/anggota') }}">Many to Many</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            Reporting
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/karyawan') }}">Export to PDF</a>
            <a class="dropdown-item" href="{{ url('/siswa') }}">Export to Excel/Import from Excel</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 align-self-stretch">
        <input
          class="form-control form-control-sm mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-sm btn-success my-2 my-sm-0" type="submit">
          Search
        </button>
      </form>
    </div>
  </div>
</nav>
<div class="overlay"></div>
<!--
<div class="container py-4 my-5">
  <div class="row">
    <div class="col-md-12">
      <h1>Left Sidebar</h1>
      <p>Switch the Repo Branch for the Right Side Bar</p>
    </div>
  </div>
</div>
-->