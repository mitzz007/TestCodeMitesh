@extends('welcome')
@section('content')
    @include('frontend.header')
    <div class="container" style="border: 1px solid;background-color:cornflowerblue;">
        <h2>Edit Your Post</h2>
        <form role="form" method="post" action= "{{ route('edit.post',$post['id'])}}">
            <div class="form-group">
                <label for="post_type">Post_type:</label>
                <input type="text" class="form-control" id="post_type" placeholder="Enter post type" name="post_type" value={{ $post['post_type'] }} >
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="text" class="form-control" id="data" placeholder="Enter data" name="post_data" value={{ $post['post_data'] }}>
            </div>
            <button type="submit" class="btn btn-default" >Submit</button>
        </form>
    </div>
@endsection