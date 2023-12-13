<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create_article(){

        return view('article.create');
    }

    public function showArticle(Article $article){
    return view('article.show', compact('article'));
    }

    public function indexArticle(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'DESC')->paginate(3);
        return view('article.index', compact('articles'));
    }

}
