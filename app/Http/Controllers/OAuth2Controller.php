<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Response;
use Input;
use Authorizer;
use League\OAuth2\Server\Exception\InvalidCredentialsException;
use League\OAuth2\Server\Exception\InvalidRefreshException;
use App\User;
use App\Models\PostModel;;

class OAuth2Controller extends Controller
{

    public function accessToken(Request $request)
    {
        Input::merge([
            'client_id' => env('OAUTH2_CLIENT_ID'),
            'client_secret' => env('OAUTH2_CLIENT_SECRET'),
        ]);

        try {
            $accessToken = Authorizer::issueAccessToken();

            $request->headers->set('Authorization', $accessToken['access_token']);
            Authorizer::validateAccessToken();

            $userId = Authorizer::getResourceOwnerId();
            $userType=User::find($userId)->type;
            $name=User::where('id','=', $userId)->pluck('name');
            $email=User::where('id','=', $userId)->pluck('email');

            $posts=PostModel::where('user_id','=', $userId)->get();
            foreach($posts as $a){
                $a->user;
            }

            $dataArray=array(
                'token' => $accessToken,
                'id' => $userId,
                'name' => $name,
                'email'=> $email,
                'userType'=>$userType,
                'code' => 200
            );

            \Session::put('userData', $dataArray);
            return view('frontend.dashboard')->with('data', $dataArray)->with('posts',$posts);


            /*return Response::json([
                'collection' => [
                    'version' => '1.0',
                    'href' => $request->url(),
                    'data' => [
                        'token' => $accessToken,
                        'userType'=>$userType,
                        'code' => 200,
                    ]
                ]
            ], 200);*/
        }
        catch(InvalidCredentialsException $e)
        {
            \Session::flash('message', 'This is a message!');
            return redirect()->route('users.post');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function logout()
    {
        \Session::flush();
        return redirect()->route('users.post');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
