<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homePage() {
       $articles = Article::where('is_accepted', true)->orderBy('created_at', 'DESC')->take(6)->get();
        return view('welcome', compact('articles'));
    }

    public function categoryShow(Category $category){
        $category = Category::findOrFail($category->id);
        $articles = $category->articles;
        return view('article.categoryShow', compact('category', 'articles'));
    }

    public function searchArticles(Request $request){
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10); 
        return view('article.index', compact('articles'));
    }

    public function setLanguage($lang){
 
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
