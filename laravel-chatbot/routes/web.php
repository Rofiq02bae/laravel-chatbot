Route::get('/chatbot-debug', function () {
    return view('chatbot-debug');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotAi;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk berita
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Route untuk chatbot
// Route::get('/chatbot', [ChatbotAi::class, 'index'])->name('chatbot.index'); // Uncomment jika ada method index
Route::post('/chatbot/ask', [ChatbotAi::class, 'ask'])->name('chatbot.ask');

// Route tambahan (opsional)
// Route::get('/hallo', [ChatbotAi::class, 'ask']);
// routes/api.php
// use Illuminate\Http\Request;
// se Illuminate\Support\Facades\

Route::get('/hello', function () {
    return response()->json([
            'message' => 'Halo, ini API pertama kamu!'
                ]);
                });

