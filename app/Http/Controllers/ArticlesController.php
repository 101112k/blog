<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticlesService;

class ArticlesController extends Controller
{
    public function view(Request $request, $uri)
    {
    	 $article = ArticlesService::getByUri($uri);
    	 if($article)
    	 {
            $comments = $article->comments()->where('is_approved', TRUE)->latest()->paginate(1);

            

    	 	return view('articles.view', [
    	 		'post' => $article,
                'comments' => $comments
    	 		]);

    	 }
    	 else
    	 {
    	 	return abort(404);
    	 }
    	 return view('articles.view');
    }
}
