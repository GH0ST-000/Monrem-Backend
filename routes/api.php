<?php
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/**
 * Admin Routes
 */
Route::post('admin/login',[AdminAuth::class,'login']);

Route::middleware(['auth:api'])->prefix('admin')->as('admin.')->group(function (){
    Route::apiResource('posts', PostController::class);
    Route::post('update-status',[PostController::class,'status']);
    Route::get('/user',[AdminAuth::class,'user']);
});




/**
 * Rest Api Routes
 */
