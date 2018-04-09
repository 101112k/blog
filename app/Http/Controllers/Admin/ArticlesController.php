<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Validator;
use Image;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(2);

        return view('admin.articles.index', [
            'articles' => $articles
            ]);

        //return view('layouts.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        if ($user->can('create', Article::class)) {
            return view('admin.articles.create');
        }    
        else
        {
            return redirect('admin/articles')->with('error', 'Нет прав');
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:250',
            'subtitle' => 'max:250',
            'intro' => 'max:65535',
            'content' => 'required|max:65535',
            'image' => 'nullable|image|mimes:jpeg,png|max:10000|dimensions:max_width=3000,max_height=2000',
            'is_published' => 'boolean'          
            ]);

        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        else
        {
            $filename = null;
            $file = $request->file('image');

            if($file)
            {
                $filename = $file->store('public/blog');
                $filename = substr($filename, strripos($filename, '/')+1);
                $this->addWatermark($filename);
                
                //
                
            }

            $article = new Article;
            $article->user_id = 1;
            $article->uri = \Slug::make($request->input('title'));
            $article->title = $request->input('title');
            $article->subtitle = $request->input('subtitle');
            $article->intro = $request->input('intro');
            $article->content = $request->input('content');
            $article->image = $filename;
            $article->is_published = (int)$request->input('is_published');
            $article->save();
            return redirect('admin/articles')->with('success', 'Статья успешно добавлена');
         

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo '<pre>';
        var_dump($id);
        echo '</pre>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        if(is_null($article))
            return redirect('admin/articles')->with('error', 'Статьи с таким ID нет!');
        return view('admin.articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:250',
            'subtitle' => 'max:250',
            'intro' => 'max:65535',
            'content' => 'required|max:65535',
            'image' => 'nullable|image|mimes:jpeg,png|max:10000|dimensions:max_width=3000,max_height=2000',
            'is_published' => 'boolean'          
            ]);

        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        else
        {
            $filename = null;
            $file = $request->file('image');

            if($file)
            {
                $filename = $file->store('public/blog');
                $filename = substr($filename, strripos($filename, '/')+1);
                $this->addWatermark($filename);
                
                //
                
            }

            //$article = new Article;
            $article = Article::find($id);
            $article->title = $request->input('title');
            $article->subtitle = $request->input('subtitle');
            $article->intro = $request->input('intro');
            $article->content = $request->input('content');
            if(!is_null($filename))
              $article->image = $filename;
            $article->is_published = (int)$request->input('is_published');
            $article->save();
            return redirect('admin/articles/'.$id.'/edit')->with('success', 'Статья успешно изменена');
         

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return back()->with('success', 'Статья успешно удалена');
    }

    protected function addWatermark($filename)
    {
                        
                //в итоговое
                $base = Image::make(storage_path('app/public/blog/'.$filename));
                $watermark = Image::make(storage_path('app/intel.png'));

                $base_width = $base->width();
                $watermark_width = $base_width * 0.2;
                $watermark->resize($watermark_width, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->rotate(-90)->opacity(50);

                $base->insert($watermark, 'bottom-right', 10, 10);
                $base->save(storage_path('app/public/blog/'.$filename));
                //return;
    }
}
