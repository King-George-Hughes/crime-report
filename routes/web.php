<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalysisReportController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\CrimeTypeController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\EmergencyTypeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// ///////////////////////// NEWS////////////////////////////
// Index News Page 
Route::get('/', [NewsController::class, 'index']);

// Show Create News Form
Route::get('/news/create', [NewsController::class, 'create']);

// Store News in Database
Route::post('/news', [NewsController::class, 'store']);

// Show Edit News Page
Route::get('/news/{new}/edit', [NewsController::class, 'edit']);

// Submit Edited News to Update 
Route::put('/news/{new}', [NewsController::class, 'update']);

// Delete News 
Route::delete('/news/{new}', [NewsController::class, 'destroy'])->middleware('auth');

// Manage News
Route::get('/news/manage', [NewsController::class, 'manage'])->middleware('auth');

// ///////////////////////// NEWS////////////////////////////




// ///////////////////////////// EMERGENCY /////////////////////////////

// Show create emergency type page 
Route::get('/emergency/create', [EmergencyTypeController::class, 'create']);

// Store Emergency Type in Database
Route::post('/emergency/create', [EmergencyTypeController::class, 'store']);

// Store Emergency in Database
Route::post('/emergency', [EmergencyController::class, 'store']);

// Store Emergency in Database
Route::put('/emergency/{emergency}/update', [EmergencyController::class, 'update']);

// Store Emergency in Database
Route::put('/emergency/{emergency}/close', [EmergencyController::class, 'close']);

// Delete Emergency form Database
Route::delete('/emergency/{emergency}', [EmergencyController::class, 'destroy']);

// ///////////////////////////// EMERGENCY /////////////////////////////




// ///////////////////////////// CRIME /////////////////////////////

// Show create crime type page 
Route::get('/crimes/create', [CrimeTypeController::class, 'create']);

// Store Crime Type in Database
Route::post('/crimes/create', [CrimeTypeController::class, 'store']);

// Store Crime in Database
Route::post('/crimes', [CrimeController::class, 'store']);

// Store Crime in Database
Route::put('/crimes/{crime}/update', [CrimeController::class, 'update']);

// Close Crime
Route::put('/crimes/{crime}/close', [CrimeController::class, 'close']);

// Delete Crime form Database
Route::delete('/crimes/{crime}', [CrimeController::class, 'destroy']);

// ///////////////////////////// CRIME /////////////////////////////


// ///////////// Analysis Report ///////////////////////////////////
// Store Analysis Type in Database
Route::post('/analysis/store', [AnalysisReportController::class, 'store']);
// ///////////// Analysis Report ///////////////////////////////////


// //////////////////////// SUPER ADMIN ///////////////////////////////
// View Super Admin Page
Route::get('/super-admin/admin', [SuperAdminController::class, 'index'])->middleware('isSuperAdmin');

//  Store Users in database
Route::post('/super-admin/admin', [SuperAdminController::class, 'store']);
// //////////////////////// SUPER ADMIN ///////////////////////////////



// ///////////////////////////// ADMIN /////////////////////////////
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    // Show Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index']);

    // Show Admin Manage Users
    Route::get('/manage-users', [AdminController::class, 'manage_users']);
    // Show Admin Manage Users

    Route::get('/manage-crimes', [AdminController::class, 'manage_crimes']);
    // Show Admin Manage Users

    Route::get('/manage-emergencies', [AdminController::class, 'manage_emergencies']);
    // Show Admin Manage Users

    Route::get('/manage-news', [AdminController::class, 'manage_news']);

    
    Route::get('/manage-feedbacks', [AdminController::class, 'manage_feedbacks']);
    // Store Emergency in Database
    // Route::post('/crimes', [CrimeController::class, 'store']);
});
// ///////////////////////////// ADMIN /////////////////////////////




// ///////////////////////// USER////////////////////////////
// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login a User 
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log User Out
Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');
// ///////////////////////// USER////////////////////////////



///////////////////////// CRIME STSRT ///////////////////////////
// Show Single Crime Page
Route::get('/crimes/{crime}', [CrimeController::class, 'show']);
///////////////////////// CRIME ENDS ///////////////////////////

///////////////////////// EMERGENCY STSRT ///////////////////////////
// Show Single Crime Page
Route::get('/emergency/{emergency}', [EmergencyController::class, 'show']);
///////////////////////// EMERGENCY  ENDS ///////////////////////////

// ///////////////////////// NEWS END////////////////////////////
// Show Single News Page
Route::get('/{new}', [NewsController::class, 'show']);
// ///////////////////////// NEWS END////////////////////////////