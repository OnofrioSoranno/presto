<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Home page 
Route::get('/', [PublicController::class, 'homePage'])->name('homePage');

// pagina creazione articolo 
Route::get('/article/create', [ArticleController::class, 'create_article'])->middleware('auth')->name('create_article');

// pagina delle categorie
Route::get('/categoria/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');

// dettaglio annuncuio
Route::get('/dettaglio/annuncio/{article}', [ArticleController::class, 'showArticle'])->name('showArticle');

// pagina per visualizzare tutti gli articoli
Route::get('/index', [ArticleController::class, 'indexArticle'])->name('indexArticle');

// pagina del revisore 
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('indexRevisor');

// rotta per accettare l'articolo come revisore
Route::patch('/accetta/annuncio/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.accept_article');

// rotta per rifiutare l'articolo come revisore
Route::patch('/rifiuta/annuncio/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.reject_article');

// richiesta per diventare revisore 
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// rende l\'utente revisore

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// ricerca annuncio 
Route::get('/ricerca/annuncio', [PublicController::class, 'searchArticles'])->name('articles_search');

// cambia lingua 
Route::get('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

// pagina profilo
Route::get('/profilo', [UserController::class, 'user_page'])->name('user_page');


