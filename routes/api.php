<?php
use App\Http\Controllers\Admin\AdminAuth;
use Illuminate\Support\Facades\Route;

/**
 * Admin Routes
 */

Route::middleware(['admin'])->prefix('admin')->as('admin.')->group(function (){
   Route::post('login',[AdminAuth::class,'login']);
});




/**
 * Rest Api Routes
 */
