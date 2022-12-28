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
Route::post('/Authenticate', [PageController::class ,'loginAuth'])-> name('loginAuth');


///////////////////////// Evaluation Form /////////////////////////////////
// route to evaluation form
Route::get('/EvaluationForm/{bName}', [PageController::class ,'eform'])-> name('eform')->middleware('auth');
// route to submit Evaluation Form
Route::put('/EvaluationSubmission', [PageController::class ,'evaluationUpdate'])-> name('evaluationUpdate');


///////////////////////// Sales Form /////////////////////////////////
// route to sales form
Route::get('/SalesForm/{bName}', [PageController::class ,'salesForm'])-> name('salesForm')->middleware('auth');
// route to submit sales Form
Route::put('/SalesSubmission', [PageController::class ,'salesUpdate'])-> name('salesUpdate');