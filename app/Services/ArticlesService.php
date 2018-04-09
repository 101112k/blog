<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use App\Article;

class ArticlesService
{
	public static function getAll($limit = 2)
	{
		$articles = Article::where('is_published', TRUE)->latest()->paginate($limit);

		$articles->map(function($item) {
			if(!empty($item->image))
			$item->image =  '/storage/blog/' . $item->image;

		$item->created_at_unix = strtotime($item->created_at);

			return $item;
		});

		return $articles;
	}

	public static function getLatest($limit = 0)
	{

		$articles = Article::where('is_published', TRUE);
		$articles = $articles->limit($limit)->latest()->get();

		return $articles;
	}

	public static function getByUri($uri)
	{
		$article = Article::where('uri', $uri)->where('is_published', TRUE)->first();
		if(is_null($article))
		{
			return false;
		}
		else
		{
		if(!empty($article->image))
			$article->image =  '/storage/blog/' . $article->image;

		$article->created_at_unix = strtotime($article->created_at);
	
		return $article;
	}

	}
}