@extends('welcome')
@section('content')
    <h2>Login Form</h2>
    <form role="form" method="post" action= "{{ route('user.details.post')}}">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection