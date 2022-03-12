@extends('layouts.main')

@section('title', 'Article')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Article (One to Many Relationship)</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Article</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form>
				<div class="w-25 input-group mb-3">
				  <span class="input-group-text"><i class="fa fa-search"></i></span>
				  <input type="text" class="form-control">
				</div>
			</form>
		  <div id="search" class="mb-3">

		    <form id="searchform" name="searchform">
		      <div class="form-group">
		        <label>Search by Title</label>
		        <input type="text" name="title" value="{{request()->get('title','')}}" class="form-control" />
		        @csrf
		      </div>
		      <div class="form-group">
		        <label>Search by body</label>
		        <input type="text" name="body" value="{{request()->get('body','')}}" class="form-control" />
		      </div>
		      <a class='btn btn-success' href='{{url("articles")}}' id='search_btn'>Search</a>
		    </form>
		  </div>

		  <div id="pagination_data">
		    @include("article.table",["articles"=>$articles])
		  </div>

		</div>
	</div>
</div>

<script>
$(function() {
  $(document).on("click", "#pagination a, #search_btn", function() {
    var url = $(this).attr("href");
    var append = url.indexOf("?") == -1 ? "?" : "&";
    var finalURL = url + append + $("#searchform").serialize();

    window.history.pushState({}, null, finalURL);
    $.get(finalURL, function(data) {
      $("#pagination_data").html(data);
    });
    return false;
  })
});
</script>
@endsection
