<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotAi;

Route::post('/chat', [ChatbotAi::class, 'ask']);
