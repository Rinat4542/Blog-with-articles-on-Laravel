@extends('main')
@section('main')
<div class="row mt-4">
    <form action="{{ route('login.action') }}" method="post">
        @csrf
        
        <div class="mb-3" >
            <label for="email" class="form-label">E-mail адрес</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email">
            @error('email')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3" >
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>
@endsection
