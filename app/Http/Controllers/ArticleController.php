<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
   public function index(Request $request)
	 {
      $articles = Article::when($request->has("title"), function($q) use($request) {
          return $q->where("title","like","%".$request->get("title")."%");
      })->paginate($perPage = 10, $columns = ['*'], $pageNum = 'articles');

			if($request->ajax()){
          return view('article.table ',['articles' => $articles]);
      }

      return view('article.index ',['articles' => $articles]);
   }
}
