<?php

use App\Http\Controllers\Agenda\AgendaController;
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
    //return view('welcome');
    return view('agenda');
});

//Route::post('/contactsave', 'Agenda\AgendaController@store');

Route::post('/contactsave', [AgendaController::class, 'store'])->name('contactsave');
Route::get('/getcontacts', [AgendaController::class, 'getcontacts'])->name('getcontacts');
Route::post('/getcontactinfo', [AgendaController::class, 'getcontactinfo'])->name('getcontactinfo');
Route::post('/delete', [AgendaController::class, 'delete'])->name('delete');
