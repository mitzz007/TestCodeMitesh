@extends('welcome')
@section('content')
    <h2>Login Form: Please Fill the Email Id and a Password</h2>
    <form role="form" method="post" action= "{{ route('user.access.token')}}">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="pwd" placeholder="Enter password" name="grant_type" value="password">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
