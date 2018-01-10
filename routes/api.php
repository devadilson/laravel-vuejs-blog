<?php

use Illuminate\Http\Request;
use \App\User;
use \App\Artigo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::get('usuarios', function () {
    return json_encode(User::all());
});

Route::get('usuarios/{id}', function ($id) {
    return json_encode(User::findOrFail($id));
});
*/
Route::delete('usuarios/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();
    return 200;
});

/*
Route::get('artigos', function () {
    return json_encode(Artigo::all());
});

Route::get('artigos/{id}', function ($id) {
    return json_encode(Artigo::findOrFail($id));
});
*/

Route::delete('artigos/{id}', function ($id) {
    $artigo = Artigo::findOrFail($id);
    $artigo->delete();
    return 200;
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
