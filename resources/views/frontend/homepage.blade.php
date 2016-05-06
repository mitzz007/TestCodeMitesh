
@extends('welcome')
@section('content')
    <div class="container" style="border: 1px solid;background-color:cornflowerblue;">
        <div class="col-sm-12"  name="header">
            <div class="col-sm-9">
                <h1>E-Poster</h1>
            </div>
            <div class="col-sm-3" class=pull-right style="color:red;">
                <h1><a href="{{ route('user.register')}} " class="btn btn-link pull-right" role="button" >Sign Up</a></h1>


                <h1><a  href="{{ route('user.login')}} "class="btn btn-link pull-right" role="button">Login</a></h1>
        </div>
        </div><hr><br>
        <div class="col-sm-12" style="border-top: 2px solid" name="body">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <th>No</th>
                        <th>User Name</th>
                        <th>Post Type</th>
                        <th>Post Data</th>
                        <th>Timestamp</th>
                        </thead>
                        <tbody>
                        @if(!is_null($posts))
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->post_type}}</td>
                                <td>{{$post->post_data}}</td>
                                <td>{{$post->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
        </div>
    </div>
@endsection
