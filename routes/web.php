<?php

use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\CrawlerController;
use App\Http\Controllers\LandingPage;
use Illuminate\Support\Facades\Route;

Route::get('/fetch-articles', [CrawlerController::class, 'scrape']);



Route::post('admin/login',[AdminAuth::class,'login']);

Route::get('/',function (){
    return view('welcome');
});

Route::get('/',[LandingPage::class,'index']);
