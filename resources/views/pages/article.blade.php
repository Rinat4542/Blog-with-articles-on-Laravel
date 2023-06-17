@extends('main')

@section('main')
    <h1>{{ $article->title }}</h1>
    <span class="badge text-bg-secondary">{{ $article->created_at }}</span>
    <p>{{ $article->body }}</p>
    <a href="{{route('article.edit', ['article'=>$article->id])}}" class="btn btn-success">Внести изменения в статью</a>
    <form action="{{route('articles.delete', ['article'=>$article->id])}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Удалить статью</button>
    </form>

    
@endsection