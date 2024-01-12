@extends('layout')
@section('content')

@auth
<a style="border:1px solid black; padding: 0.3em;" href="/create_thing">Создать вещь</a><br />
@endauth
<h1>Мои вещи: </h1>
@foreach($things as $thing)
<div class="thing-wrapper">
  <legend>{{$thing->name}}</legend>
  <p>Описание: {{$thing->description}}</p>
  <p>Срок годности: {{$thing->wrnt}}</p>
  <p>Создатель: {{$thing->master}}</p>

  <!-- <div class="thing-func">
    <a href="">Удалить вещь</a>
    <a href="/edit_thing/{{$thing->id}}">Редактировать вещь</a>
  </div> -->
</div>
@endforeach
@endsection