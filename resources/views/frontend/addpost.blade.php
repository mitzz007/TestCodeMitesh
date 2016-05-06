@extends('welcome')
@section('content')
    @include('frontend.header')
    <h2>Add A New Post</h2>
    <form role="form" method="post" action= "{{ route('post.data')}}">
        <div class="form-group">
            <label for="post_type">Post_type:</label>
            <input type="text" class="form-control" id="post_type" placeholder="Enter post type" name="post_type">
        </div>
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="text" class="form-control" id="data" placeholder="Enter data" name="post_data">
        </div>

        <button type="submit" class="btn btn-default" >Submit</button>
    </form>
@endsection
