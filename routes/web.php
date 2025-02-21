<?php

use App\Http\Controllers\SalleController;
use App\Http\Controllers\UtilisateurController;
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

//--salle Routes
Route::get('/', [SalleController::class,'show']);
Route::get('/admin/salle', [SalleController::class,'showSalles']);
Route::post('/admin/salle', [SalleController::class,'storeSalle']);
Route::delete('/admin/salle/delete/{salle}', [SalleController::class,'destroySalle']);
Route::get('/admin/salle/edit/{salle}', [SalleController::class,'editSalle']);
Route::put('/admin/salle/update/{salle}', [SalleController::class,'updateSalle']);


//--role Routes
Route::get('/admin/role', [RoleController::class,'showRole']);








