<div class="card m-2" style="width: 18rem;">
        
    <div class="card-body">
      <h5 class="card-title">{{$title ?? NULL}}</h5>
      <p class="card-text">{{substr($body, 0, 200) . '...' ?? NULL}}</p>
      <span class="badge text-bg-secondary mb-2">Дата добавления: {{$created_at ?? NULL}}</span><br>
      <a href="{{ route('article') }}" class="btn btn-primary">Прочитать статью</a>
      
    </div>
  </div>