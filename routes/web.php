<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;





Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::GET('admin/login', [App\Http\Controllers\admin\loginController::class, 'login']);
Route::POST('admin/login', [App\Http\Controllers\admin\loginController::class, 'login']);

Route::group([
    'middleware' => ['admin']], 
    function () {
    Route::get('admin/profile', [App\Http\Controllers\admin\LoginController::class, 'userProfile'])->name('admin/profile');
    Route::get('/admin', function () {
        return view('backend.dashboard.main');
    });
    
   
    Route::get('admin/manage-user', [App\Http\Controllers\MemberController::class, 'show']);
    Route::view('/admin/add-user','backend.user.adduser');
    Route::POST('/admin/add-user',[MemberController::class,'insert']);
    Route::get('admin/logout', [App\Http\Controllers\admin\loginController::class, 'logout']);
    // view user profile
    Route::get('admin/user-profile/{id}',[App\Http\Controllers\MemberController::class,'userProfile']);
    // dete user profile
    Route::get('admin/delete/{id}',[MemberController::class, 'deleteProfile']);
    // edit user profile 
    Route::get('admin/edit-user/{id}',[MemberController::class, 'edituser']);
    Route::POST('admin/edit-user',[MemberController::class,'updateUser']);
    Route::POST('admin/test',[MemberController::class, 'test']);

});
