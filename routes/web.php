<?php

use App\Http\Controllers\SalleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ReservationController;
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

//--Salle Routes
Route::get('/', [SalleController::class,'show']);
Route::get('/admin/salle', [SalleController::class,'showSalles']);
Route::post('/admin/salle', [SalleController::class,'storeSalle']);
Route::delete('/admin/salle/delete/{salle}', [SalleController::class,'destroySalle']);
Route::get('/admin/salle/edit/{salle}', [SalleController::class,'editSalle']);
Route::put('/admin/salle/update/{salle}', [SalleController::class,'updateSalle']);

//--Role Routes
Route::get('/admin/role', [RoleController::class,'showRole']);
Route::post('/admin/role', [RoleController::class,'storeRole']);
Route::delete('/admin/role/delete/{role}', [RoleController::class,'destroyRole']);
Route::get('/admin/role/edit/{role}', [RoleController::class,'editRole']);
Route::put('/admin/role/update/{role}', [RoleController::class,'updateRole']);

//--Utilisateur Routes
Route::get('/admin/utilisateur', [UtilisateurController::class,'showUtilisateur']);
Route::post('/admin/utilisateur', [UtilisateurController::class,'createUtilisateur']);
Route::delete('/admin/utilisateur/delete/{utilisateur}', [UtilisateurController::class,'destroyUtilisateur']);
Route::get('/admin/utilisateur/edit/{utilisateur}', [UtilisateurController::class,'editUtilisateur']);
Route::put('/admin/utilisateur/update/{utilisateur}', [UtilisateurController::class,'updateUtilisateur']);

//--Reservation Routes
Route::get('/admin/reservation', [ReservationController::class,'showReservation']);








