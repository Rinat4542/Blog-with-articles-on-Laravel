@extends('main')
@section('main')
<div class="row mt-4">
    <form action="{{ route('articles.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3" >
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" id="title">
            @error('title')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Текст</label>
            <textarea name="body" value="{{old('body')}}" class="form-control @error('body') is-invalid @enderror" id="body"></textarea>
            @error('body')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="preview" class="form-label">Добавить изображение</label>
            <input class="form-control @error('preview') is-invalid @enderror" name="preview" type="file" id="preview">
            @error('preview')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            
            @enderror
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" name="is_public" type="checkbox" value="" id="is-public">
            <label class="form-check-label" for="is-public">
                Статья опубликованна
            </label>
          </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
