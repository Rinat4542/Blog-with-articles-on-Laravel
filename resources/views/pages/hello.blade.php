@extends('main')
@section('main')
    <h1>Основная страница</h1>
    <h1>{{auth()->id()}}</h1>
@endsection
