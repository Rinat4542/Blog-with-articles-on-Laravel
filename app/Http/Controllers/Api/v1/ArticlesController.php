<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class ArticlesController extends Controller
{
    public function list()
    {
        $articles =  Article::query()->select(['id', 'title', 'preview_image', 'created_at'])->where('is_public', true)->get();
        //аналогичный вариант вывода запроса вариант вывода
        // Article::query()->select(['id', 'title', 'preview_image', 'created_at'])->where('is_public', true)->get();
        // вывод через перебор массива
        $data = [];
        foreach ($articles as $article) {
            $data[] = [
                'id' => $article->id,
                'title' => $article->title,
                'preview_image' => $article->preview_image,
                'created_at' => $article->created_at
            ];
        }
        return $data;
    }
    
    public function show(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'preview_image' => $article->preview_image,
            'created_at' => $article->created_at
        ];

    }
}
