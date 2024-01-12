@extends('layout')
@section('content')
<div class="container">
  <h1>Редактировать вещь {{$thing->name}}</h1>
  <form action='/things/{{$thing->id}}' method='post'>
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value='{{$thing->name}}'>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description">{{$thing->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="wrnt">Wrnt</label>
      <input type="text" class="form-control" id="wrnt" name="wrnt" value='{{$thing->wrnt}}'>
    </div>
    <div class="form-group">
      <label for="wrnt">master</label>
      <input type="text" class="form-control" id="master" name="master" value={{$username}}>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>

</div>
@endsection