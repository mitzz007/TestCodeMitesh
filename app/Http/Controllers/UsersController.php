<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Response;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return Response::json([
            'collection' => [
                'version' => '1.0',
                'href' => $request->url(),
                'data' => User::all()
            ]
        ], 200);
    }


    public function getLoginPage(){

        return view('frontend.login');
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
        $users_table_input=array(
            'name'=>Input::get('name'),
            'email'=>Input::get('email'),
            'password'=>bcrypt(Input::get('password')),
            'user_type' =>'test_user'
        );
        $user = User::create($users_table_input);

        return view('frontend.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request,$id)
    {
        $user = User::find($id);

        return Response::json([
            'collection' => [
                'version' => '1.0',
                'href' => $request->url(),
                'data' =>[ $user ]
            ]
        ], 200);

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
        $user = User::find($id);
        $user->fill(\Input::all());
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}

