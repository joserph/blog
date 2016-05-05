<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use Laracasts\Flash\Flash;
use App\Article;
use App\Image;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::Search($request->title)->orderBy('id', 'DESC')->paginate(5);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });

        //dd($articles);

        return view('admin.articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->lists('name', 'id');

        return view('admin.articles.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        // MANIPULACION DE IMAGENES
        if($request->file('image'))
        {
            $file = $request->file('image');
            $name = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/articles/';
            $file->move($path, $name);
        }
        
        $articles = new Article($request->all());
        $articles->user_id = \Auth::user()->id;
        $articles->save();

        $articles->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($articles);
        $image->save();

        Flash::success('Se ha creado el articulo ' . $articles->name . ' de forma exitosa!');

        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $article->category;
        $categories = Category::orderBy('name', 'DESC')->lists('name', 'id');
        $tags = Tag::orderBy('name', 'DESC')->lists('name', 'id');

        $myTags = $article->tags->lists('id')->ToArray();
        //dd($myTags);

        return view('admin.articles.edit')
            ->with('categories', $categories)
            ->with('article', $article)
            ->with('tags', $tags)
            ->with('myTags', $myTags);
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
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);

        Flash::warning('Se ha editado el articulo ' . $article->title . ' de forma exitosa!');

        return redirect()->route('admin.articles.index');

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

        Flash::error('El articulo ' . $article->title . ' ha sido borrado con exito!');
        return redirect()->route('admin.articles.index');
    }
}
