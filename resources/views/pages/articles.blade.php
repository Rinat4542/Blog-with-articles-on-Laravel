@extends('main')
@section('main')
    <div class="d-flex">
      @foreach ($articles as $article)
        <div div class="card m-2">
            <div class="card-body">

              <img src="{{ $article->preview_image }}" width="100" alt="{{$article->title}}">

              <h5 class="card-title">{{$article->title ?? NULL}}</h5>

              <p class="card-text">{{substr($article->body, 0, 200) . '...' ?? NULL}}</p>

              <span class="card-text">Дата добавления: {{$article->created_at ?? NULL}}</span><br>

              <a href="{{ route('article', ['article' =>$article->id]) }}" class="btn btn-primary">Прочитать статью</a>

            </div>
          </div>
      @endforeach
    </div>
@endsection
