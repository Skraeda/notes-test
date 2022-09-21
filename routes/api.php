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

// CRUD
Route::apiResource('/notes', '\App\Http\Resources\NotesApiController');

// Get Patient with all notes
Route::get('/patient/{id}', '\App\Http\Controllers\PatientController@getPatientInfo');





//Route::get('notes', 'App\Http\Controllers\NotesApiController@getAllNotes'); // read
//Route::post('/add-note', 'App\Http\Controllers\NotesApiController@addNote'); // create
//Route::put('/update-note/{id}', 'App\Http\Controllers\NotesApiController@updateNote'); // update
//Route::delete('/delete-note/{id}', 'App\Http\Controllers\NotesApiController@deleteNote'); // delete
