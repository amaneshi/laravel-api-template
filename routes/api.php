<?php

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

use Symfony\Component\HttpFoundation\Response;

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('book/{book_id}/{publisher_id}', 'BookController@setPublisher');
    Route::get('book', 'BookController@index');
    Route::get('book/{book}', 'BookController@show');
    Route::post('book', 'BookController@store');
    Route::delete('book/{book}', 'BookController@destroy');
    Route::put('book/{book}', 'BookController@update');
    Route::post('book/{book}/{genre}', 'BookController@addGenre');

    Route::get('/genre/{genre}', function (\App\Models\Genre $genre){
        $books = $genre->books;
        return $books->toJson();
    });

    Route::get('publisher','PublisherController@index');
    Route::post('publisher','PublisherController@store');
    Route::get('publisher/{publisher}','PublisherController@show');
    Route::put('publisher/{publisher}', 'PublisherController@update');
    Route::delete('publisher/{publisher}','PublisherController@destroy');
});
