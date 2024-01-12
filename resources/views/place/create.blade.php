@extends('layout')
@section('content')
<div class="container">
  <h1>Создать место</h1>
  <form action='/places' method='post'>
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
      <label for="wrnt">Repair</label>
      <input type="text" class="form-control" id="repair" name="repair">
    </div>
    <div class="form-group">
      <label for="wrnt">Work</label>
      <input type="checkbox" class="form-control" id="work" name="work">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>

</div>
@endsection