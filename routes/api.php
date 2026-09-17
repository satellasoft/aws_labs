<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentimentController;

Route::post('/sentiment', [SentimentController::class, 'analyze']);