@extends('layout')
@section('content')

@auth
<a style="border:1px solid black; padding: 0.3em;" href="/create_place">Создать место</a><br />
@endauth
<h1>Места: </h1>
@foreach($places as $place)
<div class="thing-wrapper">
  <legend>{{$place->name}}</legend>
  <p>Описание: {{$place->description}}</p>
  <p>Флаги: {{$place->repair}}</p>
  <p>В работе: {{$place->work}}</p>
  <div class="thing-func">
    <form action="/places/{{$place->id}}" method='post'>
      @method('DELETE')
      @csrf
      <button type="submit">Удалить</button>
    </form>
    <a href="/places/{{$place->id}}/edit">Редактировать вещь</a>
  </div>
</div>
@endforeach
@endsection