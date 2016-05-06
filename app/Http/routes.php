<?php
use App\SocialUsers;
use App\SocialProfiles;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('add/post',['as' => 'add.post', function () {
    return view('frontend.addpost');
}]);

Route::get('dashboard',['as' => 'user.login', function () {
    return view('frontend.dashboard');
}]);

Route::get('login',['as' => 'user.login', function () {
    return view('frontend.login');
}]);

Route::get('register',['as' => 'user.register', function () {
    return view('frontend.register');
}]);

Route::get('edit/my/post',['as' => 'edit.my.post', function () {
    return view('frontend.editpost');
}]);

Route::post('user/post',['as' => 'user.details.post', 'uses' =>'UsersController@store']);
Route::get('api/v1/post',['as' => 'users.post', 'uses' => 'PostController@index']);

Route::group(array('prefix' => 'api/v1','middleware' => ['cors2']), function() {

    Route::post('oauth/access_token',['as' => 'user.access.token', 'uses' =>'OAuth2Controller@accessToken']);
    Route::post('post/data',['as' => 'post.data', 'uses' =>'PostController@store']);
    Route::get('my/posts',['as' => 'my.post', 'uses' =>'PostController@getIndividualPosts']);
    Route::get('delete/post/{id}',['as' => 'delete.post', 'uses' =>'PostController@destroy']);
    Route::post('edit/post/{id}',['as' => 'edit.post', 'uses' =>'PostController@update']);
    Route::get('post/{id}',['as' => 'show.post', 'uses' =>'PostController@show']);
    Route::get('user/logout',['as' => 'user.logout', 'uses' =>'OAuth2Controller@logout']);

});

Route::group(array('prefix' => 'api/v1','middleware' => ['oauth','cors2']), function() {
    Route::resource('users', 'UsersController');
});






