<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use App\Article;
use App\Comment;

class CommentsService
{
	public static function getLatest($limit = 0)
	{

		$comments = Comment::where('is_approved', TRUE);
		$comments = $comments->limit($limit)->latest()->get();

		return $comments;
	}

}