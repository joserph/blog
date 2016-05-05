<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(2);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });
        
        //dd($articles);
        return view('front.index')
            ->with('articles', $articles);
    }

}
