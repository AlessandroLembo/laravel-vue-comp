<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VideogameController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Rotta API per il metodo index
Route::get('/videogames', [VideogameController::class, 'index']);

Route::get('/videogames/{id}', [VideogameController::class, 'show']);

//Rotta per ricevere il messaggio dagli utenti

Route::post('/contact-message', [ContactController::class, 'send']);
