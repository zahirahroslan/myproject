@extends('layout');

@section('content')

  <h2>Login here</h2>
  <form action="login_check" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}">


    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" name="email">
    
     @if($errors->has('username')) <p>{{$errors->first('username')}} </p>@endif
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password" name="pwd">

     @if($errors->has('password')) <p>{{$errors->first('password')}} </p>@endif
    </div>

    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

@endsection