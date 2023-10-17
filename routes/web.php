<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\Backend\ExperienceController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Index2Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class, 'index']);

Route::get('/index2', [Index2Controller::class, 'index2']);

// Route::get('about',[HomeController::class, 'about']);

Route::get('components',[HomeController::class, 'components']);

Route::get('download-pdf', [PdfController::class, 'index']);



//Admin

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard',[DashboardController::class, 'dashboard']);

    // Home
    Route::get('admin/home',[DashboardController::class, 'admin_home']);

    Route::post('admin/home/post',[DashboardController::class, 'admin_home_post']);

    Route::get('admin/home/delete/{id}',[DashboardController::class, 'admin_home_delete']);

    Route::post('admin/home/delete/{id}',[DashboardController::class, 'admin_home_delete_post']);

    // About
    Route::get('admin/about',[DashboardController::class, 'admin_about']);

    Route::post('admin/about/post',[DashboardController::class, 'admin_about_post']);

    Route::get('admin/about/delete/{id}',[DashboardController::class, 'admin_about_delete']);

    Route::post('admin/about/delete/{id}',[DashboardController::class, 'admin_about_delete_post']);


    // Education
    Route::get('admin/education',[DashboardController::class, 'admin_education']);
    
    Route::post('admin/education/post',[DashboardController::class, 'admin_education_post']);

    Route::get('admin/education/delete/{id}',[DashboardController::class, 'admin_education_delete']);

    Route::post('admin/education/delete/{id}',[DashboardController::class, 'admin_education_delete_post']);


    // Portfolio 
    Route::get('admin/portfolio',[DashboardController::class, 'admin_portfolio']);

    Route::get('admin/portfolio/add',[PortfolioController::class, 'portfolio_add']);

    Route::post('admin/portfolio/add',[PortfolioController::class, 'portfolio_add_post']);

    Route::get('admin/portfolio/edit/{id}',[PortfolioController::class, 'admin_portfolio_edit']);
    
    Route::post('admin/portfolio/edit/{id}',[PortfolioController::class, 'admin_portfolio_edit_post']);

    Route::get('admin/portfolio/delete/{id}',[PortfolioController::class, 'admin_portfolio_delete']);
   
    Route::post('admin/portfolio/delete/{id}',[PortfolioController::class, 'admin_portfolio_delete_post']);

    // Experience
    Route::get('admin/experience',[DashboardController::class, 'admin_experience']);

    Route::get('admin/experience/add',[ExperienceController::class, 'experience_add']);

    Route::post('admin/experience/add',[ExperienceController::class, 'experience_add_post']);

    Route::get('admin/experience/edit/{id}',[ExperienceController::class, 'admin_experience_edit']);
    
    Route::post('admin/experience/edit/{id}',[ExperienceController::class, 'admin_experience_edit_post']);
    
    Route::get('admin/experience/delete/{id}',[DashboardController::class, 'admin_experience_delete']);
    
    Route::post('admin/experience/delete/{id}',[DashboardController::class, 'admin_experience_delete_post']);

    // Skill
    Route::get('admin/skill',[DashboardController::class, 'admin_skill']);

    Route::get('admin/skill/add',[SkillController::class, 'skill_add']);

    Route::post('admin/skill/add',[SkillController::class, 'skill_add_post']);

    Route::get('admin/skill/edit/{id}',[SkillController::class, 'admin_skill_edit']);
    
    Route::post('admin/skill/edit/{id}',[SkillController::class, 'admin_skill_edit_post']);

    Route::get('admin/skill/delete/{id}',[SkillController::class, 'admin_skill_delete']);
    
    Route::post('admin/skill/delete/{id}',[SkillController::class, 'admin_skill_delete_post']);


    // Route::get('admin/contact',[DashboardController::class, 'admin_contact']);
});

Route::get('login',[AuthController::class, 'login']);

Route::post('login_admin',[AuthController::class, 'login_admin']);

Route::get('forgot',[AuthController::class, 'forgot']);

Route::post('forgot_admin',[AuthController::class, 'forgot_admin']);

Route::get('logout',[AuthController::class, 'logout']);