<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArticlesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:1|max:25',
            'body' => ['required', 'string', 'min:15', 'max:500'],
            'preview' => 'required|image|max:1000'
        ]);
        
        $previewImagePath = "/storage/{$request->file('preview')->store('article/previews')}";
        

        //Первая реализация добавления
        $article = new Article();
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->is_public = $request->has('is_public');
        $article->preview_image = $previewImagePath;
        $article->save();

        //аналогичный способ добавления через массив
        // $article = Article::created([
        //     'title' =>$request->input('title'),
        //     'body' =>$request->input('body'),
        //     'is_public' =>$request->has('is_public'),
        //     "preview_image" => $previewImagePath
        // ]);

        return redirect()->route('article', [
            'article' => $article->id
        ]);

    }

    public function update(UpdateRequest $request, Article $article)
    {
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->save();

        // $article->update([
        //     'title'=>$request->input('title'),
        //     'body'=>$request->input('body'),
            
        // ]);
        

        return redirect()->back();

            
        
    }
    public function delete(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles');

    }
}
