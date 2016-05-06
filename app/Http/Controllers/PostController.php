<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\PostModel;
use Response;
use Authorizer;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $posts=PostModel::all();
        foreach($posts as $a){
            $a->user;
        }
       // return $posts;
        return view('frontend.homepage')->with('posts', $posts);
    }

    public function getIndividualPosts(Request $request)
    {
        $data = \Session::get('userData');
        $posts=PostModel::where('user_id','=', $data['id'])->get();
        foreach($posts as $a){
            $a->user;
        }
        return view('frontend.dashboard')->with('data', $data)->with('posts', $posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = \Session::get('userData');
        $post_table_input=array(
            'user_id'=> $user['id'],
            'post_type'=>$request->get('post_type'),
            'post_data'=>$request->get('post_data')
        );
        $post = PostModel::create($post_table_input);
        return redirect()->route('my.post');


        /*$posts=PostModel::all();
        foreach($posts as $a){
            $a->user;
        }
        return view('frontend.homepage')->with('posts', $posts);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request,$id)
    {
        $post = PostModel::find($id);
        return view('frontend.editpost')->with('post',$post);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = PostModel::find($id);
        $post->fill(\Input::all());
        $post->save();
        return redirect()->route('my.post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        PostModel::destroy($id);
        return redirect()->route('my.post');
    }
}