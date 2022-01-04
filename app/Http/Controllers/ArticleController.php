<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
   public function index() {
   	 $artikel = Article::all();
	 return view('article/index',['artikel' => $artikel]);
   }
}
