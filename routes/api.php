<?php

use App\Http\Controllers\PollyController;
use App\Http\Controllers\SentimentController;
use Illuminate\Support\Facades\Route;

Route::post('/sentiment', [SentimentController::class, 'analyze']);
Route::post('/polly/synthesize', [PollyController::class, 'synthesize']);
