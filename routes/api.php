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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('notes', 'App\Http\Controllers\NotesApiController@getAllNotes'); // read
//Route::post('/add-note', 'App\Http\Controllers\NotesApiController@addNote'); // create
//Route::put('/update-note/{id}', 'App\Http\Controllers\NotesApiController@updateNote'); // update
//Route::delete('/delete-note/{id}', 'App\Http\Controllers\NotesController@destroy'); // delete
