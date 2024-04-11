<?php

use App\Http\Controllers\CrawlerController;
use Illuminate\Support\Facades\Route;

Route::get('/fetch-articles', [CrawlerController::class, 'scrape']);
