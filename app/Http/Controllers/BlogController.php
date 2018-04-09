<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        //$articles = Article::orderBy('id','asc')->paginate(2);

        $articles = BlogService::getArticles();
        return view('blog.index', ['articles' => $articles]);




    	//$id = $request->input('id');
    	//return $id;
        
        /* 19/03/18$users = User::all();

        /*$user = User::find(1);
        $user->articles()->create([
            'title' => 'Это моя вторая статья',
            'content' => 'Контент',
            'image' => 'image2.png',
            'is_published' => TRUE
            ]);
        echo '<pre>';
        var_dump($user);
         echo '</pre>';*/

        //19/03/18$articles = Article::all();
        /*foreach($users as $user) {
            echo '<pre>';
            var_dump($user->name);
            echo '</pre>';
        }*/

        /*foreach($articles as $article) {
            echo '<pre>';
            var_dump($article->title);
            echo '</pre>';
        }*/

        /*19/03/18foreach($articles as $article) {
            echo '<pre>';
            var_dump($article->title);
            echo '</pre>';
            $user = $article->user()->first();
            echo '<pre>';
            var_dump($user->name);
            echo '</pre>';
        }*/

        /*foreach($users as $user) {
            $articles = $user->articles()->where('is_published', 1)->get();
            echo '<pre>';
            var_dump($articles);
            echo '</pre>';
        }*/
        
        /*$user = new User;
        $user->email = 'user@example.com';
        $user->name = 'Вася Пупкин';
        $user->save();*/

        /*$article = new Article;
        $article->user_id = 1;
        $article->title = 'Это моя первая запись в блоге';
        $article->content = 'Это мой первый контент в блоге';
        $article->image = 'image.png';
        $article->is_published = FALSE;
        $article->save();*/


    	return view('blog.index', ['articles' => $articles]);

    }

    public function view(Request $request, $id)
    {
        /*$blogService = new BlogService;
        $blogService = $blogService->getArticle($id);
         return view('blog.view', [
            'id' => $id,
            ]);
         $article = BlogService::getArticle();*/



        $articles = Article::where('id', '=', $id)->get();
        return view('blog.view', [
            'id' => $id,
            'articles' => $articles
        ]);
    }
}
