<?php

use App\Http\Controllers\MembreController;
use App\Models\Membre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $membres= Membre::all();

    return view('welcome', compact('membres'));
});

Route::get('/create',[MembreController::class, 'create']);

Route::get('/{id}/edit',[MembreController::class, 'edit']);
Route::put('/{id}/update',[MembreController::class, 'update']);
Route::post('/store',[MembreController::class, 'store']);
