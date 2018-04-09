<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use App\Article;

class BlogService
{
	public static function getArticles()
	{
		$articles = Article::all();

        $articles->map(function ($item, $key) {
            $item->image = '/path/to/image/' . $item->image;
            return $item;
        });

        return $articles;

	}    

	public function getArticle ($id)
	{
		$article = Article::where('id', $id)->get();
		return $article;
	}
}