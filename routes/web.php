<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Frontend\LoginController;
use App\Http\controllers\Frontend\TlController;
use App\Http\controllers\Frontend\ManagerController;
use App\Http\controllers\Frontend\LeaveController;
use App\Http\controllers\Frontend\UserController;
use App\Http\controllers\Frontend\TimeinController;
use App\Http\controllers\Frontend\TimeoutController;  
use App\Http\controllers\Frontend\UserStatusController;
use App\Http\controllers\Frontend\EmployeeDataController;
use App\Http\controllers\Frontend\TlDataController;
use App\Http\controllers\Frontend\GetStatusController;
use App\Http\controllers\Frontend\LeaveRequestsController;
use App\Http\controllers\Frontend\TlLeaveRequestsController;
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
// -------------Middleware for Same Route -------------
Route::group(['middleware'=>['custom']],function()
{
	Route::get('projects', function () {return view('frontend.projects');});
	Route::get('dashboard', function () {return view('frontend.dashboard.dashboard');});
	Route::post('leave',[LeaveController::class,'leave']);
	Route::get('logout', [LoginController::class, 'logout']);
	Route::Post('update_user_status',[UserStatusController::class,'update_user_status']);
	Route::Post('get_user_status',[GetStatusController::class,'get_user_status']);
    Route::Post('feedback',[UserController::class,'feedback']);
});
 // ---------------Middleware for User ----------------
Route::group(['middleware' => ['user']],function () 
{
    Route::get('user', [UserController::class, 'profile']);
    Route::get('profile', [UserController::class, 'profile']);
});
// -------------------Middleware for TL -------------------
Route::group(['middleware' => ['tl_middleware']],function () 
{
    Route::get('tl',[TlController::class,'profile']);
    Route::get('accept_leave/{id}',[LeaveRequestsController::class,'accept_leave']);
    Route::get('reject_leave/{id}',[LeaveRequestsController::class,'reject_leave']);
    Route::get('user_leave_request',[TlController::class,'user_leave_request']);
    Route::get('employee_data',[EmployeeDataController::class,'employee_data']);
    Route::Post('employee_attendance',[EmployeeDataController::class,'employee_attendance']);
    Route::get('edit/{id}',[EmployeeDataController::class,'edit_attendance']);
    // Route::get('profile', [TlController::class, 'profile']);
});
// ----------------------Middleware for Manager ----------
Route::group(['middleware' => ['manager']],function () 
{
	Route::get('profile', [ManagerController::class, 'profile']);
    Route::get('manager',[ManagerController::class,'profile']);
    Route::get('tl_leave_request',[LeaveRequestsController::class,'tl_leave_request']);
    Route::get('accept_tl_leave/{id}',[TlLeaveRequestsController::class,'accept_tl_leave']);
    Route::get('reject_tl_leave/{id}',[TlLeaveRequestsController::class,'reject_tl_leave']);
// -----------------Employee Attendance -------------
    
// -----------------TL Attendance -----------------
    Route::get('tl_data',[TlDataController::class,'tl_data']);
    Route::Post('tl_attendance',[TlDataController::class,'tl_attendance']);
    Route::get('update/{id}',[TlDataController::class,'update_attendance']);
});
// ----------------Routes for Login-----------------
Route::get('/', [LoginController::class, 'abc']);
Route::Post('login', [LoginController::class, 'login']);
Route::Post('timein',[TimeinController::class,'time_in']);
Route::Post('timeout',[TimeoutController::class,'time_out']);
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');