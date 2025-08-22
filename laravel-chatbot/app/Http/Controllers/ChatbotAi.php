<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotAi extends Controller
{
        public function ask(Request $request)
        {
                $question = $request->input('question');

                // Panggil OpenRouter API
                $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                        'Content-Type' => 'application/json',
                ])->post(env('OPENROUTER_API_URL'), [
                        'model' => 'openai/gpt-4o-mini',
                        'messages' => [
                                ['role' => 'system', 'content' => 'Kamu adalah chatbot Laravel yang ramah dan membantu.'],
                                ['role' => 'user', 'content' => $question],
                        ],
                ]);

                // Ambil hasil jawaban
                if ($response->successful()) {
                        $answer = $response->json('choices.0.message.content');
                } else {
                        $answer = "Maaf, ada masalah saat menghubungi AI.";
                }

                return response()->json([
                        'question' => $question,
                        'answer' => $answer,
                ]);
        }
}