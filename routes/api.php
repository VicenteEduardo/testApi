<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'Api\AuthController@login');


Route::group(['middleware' => ['jwt.auth']], function () {


        Route::post('/auth/token', 'Api\AuthController@refresh');

        /** start books */
        Route::get('/livros/list', 'Api\LivroController@index');
        Route::post('/livros/create', 'Api\LivroController@store');
        Route::get('/livros/show/{id}', 'Api\LivroController@show');
        Route::put('/livros/update/{id}', 'Api\LivroController@update');
        Route::delete('/livros/delete/{id}', 'Api\LivroController@destroy');
        /** end books */

        /** start index */
        Route::get('/index/list', 'Api\IndiceController@index');
        Route::post('/index/create', 'Api\IndiceController@store');
        Route::get('/index/show/{id}', 'Api\IndiceController@show');
        Route::put('/index/update/{id}', 'Api\IndiceController@update');
        Route::delete('/index/delete/{id}', 'Api\IndiceController@destroy');
        /** end index */

        /**subindices */
        Route::get('/subindices/list', 'Api\SubindiceController@index');
        Route::post('/subindices/create', 'Api\SubindiceController@store');
        Route::get('/subindices/show/{id}', 'Api\SubindiceController@show');
        Route::put('/subindices/update/{id}', 'Api\SubindiceController@update');
        Route::delete('/subindices/delete/{id}', 'Api\SubindiceController@destroy');
        /** end subindices */

});
