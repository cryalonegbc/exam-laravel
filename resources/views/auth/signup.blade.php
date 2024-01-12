@extends('layout')
@section('content')
<form class='auth__form' action="/auth/signup" method="post">
  @csrf
  <h1>Регистрация</h1><br />
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
      placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="usernameInput">Username</label>
    <input name="name" type="text" id="usernameInput" class="form-control" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection