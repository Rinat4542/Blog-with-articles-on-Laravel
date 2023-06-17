<?php

namespace App\Http\Controllers;

use App\Models\Article;


class PagesController extends Controller
{
    
    public function showArticle( $article)
    {
        $articleItem = Article::find($article);

        if(is_null($articleItem))
        {   
            return abort(404);
        }

        return view('pages.article',[

            'article'=>$articleItem
        ]);

    }
    public function updateArticle(Article $article)
    {
        return view('pages.article_edit', ['article'=>$article]);
    }

    public function hello()
    {
        return view('pages.hello');
    }

    public function articles()
    {
        $articles = Article::all();
        
        return view('pages.articles', ['articles' => $articles]);
    }

    public function createArticlesForm()
    {
        return view('pages.article_create');
    }
}
