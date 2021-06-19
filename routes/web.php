<?php

use App\Http\Controllers\AffaireController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PointeuseController;
use App\Http\Controllers\UploadController;
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

Route::get('/clientslist', [ClientController::class, 'getClients'])->middleware('auth');
Route::get('/client/c-{id}', [ClientController::class, 'getClient']);
//Route::get('/client/add', [\App\Http\Controllers\ClientController::class , 'clientAddForm']);
//Route::get('/client/add/', [\App\Http\Controllers\ClientController::class , 'clientAddForm']);
Route::match(array('GET', 'POST'), '/client/add/', [ClientController::class, 'clientAddForm']);
Route::post('/client/edit/{id}', [ClientController::class, 'edit_client']);

Route::get('/client/sinistre/delete/{id}', [ClientController::class, 'deleteSinistre']);
Route::get('/client/sanction/delete/{id}', [ClientController::class, 'deleteSanction']);


Route::post('clients/voitures/sinistres/add', [ClientController::class, 'sinistresAdd']);
Route::post('clients/voitures/sanctions/add', [ClientController::class, 'sanctionsAdd']);


//taches Actions
Route::get('/taches', [ClientController::class, 'taches']);
Route::post('/addaction', [ClientController::class, 'addAction']);
Route::post('/change_action_etat', [ClientController::class, 'changeActionEtat']);
Route::get('/change_action_etat', [ClientController::class, 'changeActionEtat']);
Route::post('/change_reponsable', [ClientController::class, 'changeReponsable']);


//Contrat Routes.
Route::post('/contrats/create', [\App\Http\Controllers\ContratController::class, 'create']);
Route::get('contrats/get{id}', [\App\Http\Controllers\ContratController::class, 'show']);


//Pointeuse Routes.
Route::post('/pointeuse/', [PointeuseController::class, 'index']);
Route::get('/pointeuse/validations', [PointeuseController::class, 'validations']);
Route::post('/pointeuse/validations', [PointeuseController::class, 'validations']);
Route::post('/pointeuse/setValidations', [PointeuseController::class, 'setValidations']);


//Affaires File.
Route::get('affaires', [AffaireController::class, 'listing']);
Route::get('getfile/{path}', [UploadController::class, 'getfile']);


//Upload File.
Route::post('client/uploads', [UploadController::class, 'uploads']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
    return redirect('/clientslist');
})->name('dashboard');


Route::get('/clear', function () {

    $users = User::first()->toArray();
//    dd($users);
    $user = [
        'id'=>1,
        'iname'=>1,
    ];
    return $user;


    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
//    return "Cache is cleared"
//    $user_id = 6;
//    $obj_user = User::find($user_id);
//    $obj_user->password = Hash::make('sajid');
//    $obj_user->save();
//    return "ok";


});



