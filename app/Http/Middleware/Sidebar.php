<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\ArticlesService;
use App\Services\CommentsService;

class Sidebar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $articles = ArticlesService::getLatest(5);
       $request->attributes->set('articles', $articles);

       $comments = CommentsService::getLatest(5);
       $request->attributes->set('comments', $comments);

       return $next($request);  
    }
}
