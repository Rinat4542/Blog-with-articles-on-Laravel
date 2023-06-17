<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\RigisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function(){
    return view('main');
});

Route::controller(PagesController::class)->group(function()
{
    Route::get('/hello', [PagesController::class, 'hello'])->name('hello');
    Route::get('/articles', [PagesController::class, 'articles'])->name('articles');
    Route::get('/articles/create', [PagesController::class, 'createArticlesForm'])->name('create.articles');
    Route::get('/articles/{article}', [PagesController::class, 'showArticle'])->name('article');
    Route::get('/articles/{article}/edit', [PagesController::class, 'updateArticle'])->name('article.edit');
});

Route::controller(ArticlesController::class)->group(function()
{
    Route::post('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
    Route::post('/articles/{article}/update', [ArticlesController::class, 'update'])->name('articles.update');
    Route::post('/articles/{article}/delete', [ArticlesController::class, 'delete'])->name('articles.delete');

});

Route::controller(RigisterController::class)->group(function()
{
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'register')->name('register.action');
    
});

Route::controller(LoginController::class)->group(function()
{
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'login')->name('login.action');
    Route::post('/logout', 'logout')->name('logout');
});





