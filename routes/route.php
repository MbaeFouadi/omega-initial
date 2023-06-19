<?php

use App\Http\Controllers\candidatController;
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

Route::get('/accueil', function () {
    $data=DB::table("candidat")->where("id",1)->first();
    return view('index',compact('data'));
})->name('accueil');
Route::post('/', function () {
    $data=DB::table("candidat")->where("id",1)->first();
    return view('index',compact('data'));
});

Route::get('/', function () { 
    return view('auth_login');
})->name('/');

Route::get('inscription', function () { 
    return view('auth_register');
})->name("inscription");

Route::post('candidats',[candidatController::class,'updates'])->name("candidats");
Route::resource('candidat',candidatController::class);