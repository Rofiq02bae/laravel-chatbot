<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk berita
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Route untuk chatbot
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');
