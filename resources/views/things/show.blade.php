@extends('layout')
@section('content')

@auth
<a style="border:1px solid black; padding: 0.3em;" href="/create_thing">Создать вещь</a><br />
@endauth
<h1>Вещи: </h1>
@foreach($things as $thing)
<div class="thing-wrapper">
  <legend>{{$thing->name}}</legend>
  <p>Описание: {{$thing->description}}</p>
  <p>Срок годности: {{$thing->wrnt}}</p>
  <p>Создатель: {{$thing->master}}</p>
  @foreach($uses as $use)
    @if($use->thing_id == $thing->id)
      @foreach($places as $place)
        @if($place->id == $use->place_id)
          <p>Место хранения: {{$place->name}}</p>
        @endif
      @endforeach
    @endif
  @endforeach
  
  <div class="thing-func">
    <form action="/things/{{$thing->id}}" method='post'>
      @method('DELETE')
      @csrf
      <button type="submit">Удалить</button>
    </form>
    <a href="/things/{{$thing->id}}/edit">Редактировать вещь</a>
  </div>
</div>
@endforeach
@endsection