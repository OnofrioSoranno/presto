<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_page(Request $request){
        $user = $request->user();
        $articles = Article::where('user_id', $user->id)->get()->sortByDesc('created_at');
        return view('user_page', compact('articles', 'user'));
    }
}
