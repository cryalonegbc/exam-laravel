@extends('layout')
@section('content')

@auth
<h1>Пользователи: </h1>
@foreach($users as $user)
<div class="thing-wrapper">
  <legend>{{$user->name}}</legend>
</div>
@endforeach
@endauth
@endsection