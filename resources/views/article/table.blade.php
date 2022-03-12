<table class="table table-striped table-bordered">
	<thead>
	  <tr class="text-center">
	    <th>No.</th>
	    <th>Title</th>
	    <th>Body</th>
	    <th>Date</th>
			<th>Options</th>
	  </tr>
	</thead>
	<tbody>
		@php $i = $articles->currentPage() * $articles->perPage() - $articles->perPage() + 1;  @endphp
	  @foreach($articles as $article)
	  <tr>
	    <td>{{ $i }}</td>
	    <td>{{ $article->title }}</td>
	    <td>{{ substr($article->body, 0, 40) }}</td>
	    <td>{{ $article->created_at }}</td>
	 	  <td>
				<a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
				<a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"></i></a>
				<button type="button" class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></button>
			</td>
	  </tr>
		@php $i++ @endphp
	  @endforeach
	</tbody>
</table>

<div id="pagination">
	<p class="mt-3 float-right"><strong>Halaman :</strong> {{ $articles->currentPage() }} <strong>Jumlah Data :</strong> {{ $articles->total() }} <strong>Data Per Halaman :</strong> {{ $articles->perPage() }}</p>

	<p class="mt-2">{{ $articles->links() }}</p></div>
