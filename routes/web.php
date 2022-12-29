<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class ,'index'])-> name('index') ;

// route to login authentication
Route::get('/login', [PageController::class ,'login'])-> name('login') ;
Route::post('/Authenticate', [PageController::class ,'loginAuth'])-> name('loginAuth');

///////////////////////// Business Forms Redirect page /////////////////////////////////
Route::get('/Business/{bName}', [PageController::class ,'business'])-> name('business')->middleware('auth');


///////////////////////// Evaluation Form /////////////////////////////////
// route to evaluation form
Route::get('/EvaluationForm/{bName}', [PageController::class ,'eform'])->middleware('auth');
// route to submit Evaluation Form
Route::put('/EvaluationSubmission', [PageController::class ,'evaluationUpdate'])-> name('evaluationUpdate');


///////////////////////// Sales Form /////////////////////////////////
// route to sales form
Route::get('/SalesForm/{bName}', [PageController::class ,'salesForm'])->middleware('auth');
// route to submit sales Form
Route::put('/SalesSubmission', [PageController::class ,'salesUpdate'])-> name('salesUpdate');


///////////////////////// Leaderboard /////////////////////////////////
Route::get('/Leaderboard', [PageController::class ,'getStallData'])-> name('leaderboard');