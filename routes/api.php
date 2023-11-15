<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GaleriController;    
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/skills', [SkillController::class, 'index']);
Route::post('/skills', [SkillController::class, 'store']);
Route::put('/skills/{id}', [SkillController::class, 'update']);
Route::delete('/skills/{id}', [SkillController::class, 'destroy']);

Route::get('/education', [EducationController::class,'index']);
Route::post('/education', [EducationController::class, 'store']);
Route::put('/education/{id}', [EducationController::class, 'update']);
Route::delete('/education/{id}', [EducationController::class, 'destroy']);

Route::get('/portfolio', [PortfolioController::class,'index']);
Route::post('/portfolio', [PortfolioController::class, 'store']);
Route::put('/portfolio/{id}', [PortfolioController::class, 'update']);
Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy']);

Route::get('/experience', [ExperienceController::class,'index']);
Route::post('/experience', [ExperienceController::class, 'store']);
Route::put('/experience/{id}', [ExperienceController::class, 'update']);
Route::delete('/experience/{id}', [ExperienceController::class, 'destroy']);

Route::get('/galeri', [GaleriController::class,'index']);
Route::post('/galeri', [GaleriController::class, 'store']);
Route::put('/galeri/{id}', [GaleriController::class, 'update']);
Route::delete('/galeri/{id}', [GaleriController::class, 'destroy']);

Route::get('/about', [AboutController::class,'index']);
Route::post('/about', [AboutController::class, 'store']);
Route::put('/about/{id}', [AboutController::class, 'update']);
Route::delete('/about/{id}', [AboutController::class, 'destroy']);

Route::get('/about', [AboutController::class,'index']);
Route::post('/about', [AboutController::class, 'store']);
Route::put('/about/{id}', [AboutController::class, 'update']);
Route::delete('/about/{id}', [AboutController::class, 'destroy']);

Route::get('/home', [DashboardController::class,'index']);
Route::post('/home', [DashboardController::class, 'store']);
Route::put('/home/{id}', [DashboardController::class, 'update']);
Route::delete('/home/{id}', [DashboardController::class, 'destroy']);