@extends('welcome')
@section('content')
    @include('frontend.header')
    <div class="container" style="border: 1px solid;background-color:cornflowerblue;">
        <div class="col-sm-12" style="border-top: 2px solid" name="body"><br>
            <div class="row">
                <div class="col-sm-5">
                    Name : {{ $data['name'] }}
                </div>
                <div class="col-sm-5">
                    Email: {{ $data['email'] }}
                </div>
            </div><br>
            <div class="row" style="border: 1px solid;">
            <div class="col-sm-10"><h1>Posts</h1></div>
            <div class="col-sm-1"><button onclick="window.location='{{ route("add.post") }}'" class="btn btn-info">Add Post</button></div>

               <table class="table table-bordered table-striped">
                    <thead>
                    <th>Serial No</th>
                    <th>Post Type</th>
                    <th>Post Data</th>
                    <th>Timestamp</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @if(!is_null($posts))
                        @foreach ($posts as $a)
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>{{$a->post_type}}</td>
                                <td>{{$a->post_data}}</td>
                                <td>{{$a->created_at}}</td>
                                <td>
                                    <input type="button" onclick="window.location='{{ route("show.post",[$a->id]) }}'" class="btn btn-info" name="edit" value="Edit">

                                    <input type="button" onclick="window.location='{{ route("delete.post",[$a->id]) }}'" class="btn btn-info" name="delete" value="Delete">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
