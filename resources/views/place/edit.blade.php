@extends('layout')
@section('content')
<div class="container">
  <h1>Редактировать место {{$place->name}}</h1>
  <form action='/places/{{$place->id}}' method='post'>
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value='{{$place->name}}'>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description">{{$place->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="wrnt">Repair</label>
      <input type="text" class="form-control" id="wrnt" name="wrnt" value='{{$place->repair}}'>
    </div>
    <div class="form-group">
      <label for="wrnt">Work</label>
      <input type="text" class="form-control" id="master" name="master" value='{{$place->work}}'>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>

</div>
@endsection