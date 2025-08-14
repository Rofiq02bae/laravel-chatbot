<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    /**
     * Menampilkan halaman chatbot
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('chatbot');
    }

    /**
     * Memproses pertanyaan chatbot dan mencari berita relevan
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ask(Request $request)
    {
        // Validasi input
        $request->validate([
            'question' => 'required|string|max:500'
        ]);

        $question = $request->input('question');
        
        // Cari berita yang relevan berdasarkan kata kunci
        $relevantNews = $this->searchRelevantNews($question);
        
        // Generate response
        if ($relevantNews->isNotEmpty()) {
            $answer = $this->generateAnswerFromNews($relevantNews);
            $relatedNewsData = $this->formatNewsData($relevantNews);
        } else {
            $answer = "Maaf, saya tidak menemukan berita yang relevan dengan pertanyaan Anda.";
            $relatedNewsData = [];
        }

        return response()->json([
            'question' => $question,
            'answer' => $answer,
            'related_news' => $relatedNewsData
        ]);
    }

    /**
     * Mencari berita relevan berdasarkan kata kunci
     *
     * @param string $question
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function searchRelevantNews($question)
    {
        // Pisahkan pertanyaan menjadi kata-kata kunci
        $keywords = $this->extractKeywords($question);
        
        $query = News::query();
        
        // Buat query LIKE untuk setiap kata kunci
        foreach ($keywords as $keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'LIKE', "%{$keyword}%")
                  ->orWhere('content', 'LIKE', "%{$keyword}%")
                  ->orWhere('category', 'LIKE', "%{$keyword}%");
            });
        }
        
        return $query->orderBy('published_at', 'desc')
                    ->limit(5)
                    ->get();
    }

    /**
     * Ekstrak kata kunci dari pertanyaan
     *
     * @param string $question
     * @return array
     */
    private function extractKeywords($question)
    {
        // Hapus kata-kata umum (stop words) bahasa Indonesia
        $stopWords = [
            'apa', 'yang', 'di', 'ke', 'dari', 'pada', 'untuk', 'dengan', 'oleh', 'dalam',
            'tentang', 'berita', 'informasi', 'kabar', 'bagaimana', 'mengapa', 'kapan',
            'dimana', 'siapa', 'ada', 'tidak', 'adalah', 'itu', 'ini', 'dan', 'atau',
            'tapi', 'tetapi', 'juga', 'saya', 'kamu', 'dia', 'mereka', 'kita'
        ];
        
        // Bersihkan dan pisahkan kata
        $words = preg_split('/\s+/', strtolower(trim($question)));
        
        // Filter kata-kata yang bermakna (lebih dari 2 karakter dan bukan stop words)
        $keywords = array_filter($words, function($word) use ($stopWords) {
            return strlen($word) > 2 && !in_array($word, $stopWords);
        });
        
        return array_values($keywords);
    }

    /**
     * Generate jawaban dari berita yang ditemukan
     *
     * @param \Illuminate\Database\Eloquent\Collection $news
     * @return string
     */
    private function generateAnswerFromNews($news)
    {
        $count = $news->count();
        
        if ($count == 1) {
            $article = $news->first();
            $summary = $this->getContentSummary($article->content);
            return "Saya menemukan 1 berita relevan: \"{$article->title}\". {$summary}";
        } else {
            $titles = $news->pluck('title')->take(3)->implode('", "');
            return "Saya menemukan {$count} berita relevan, antara lain: \"{$titles}\". Silakan lihat detail di related_news.";
        }
    }

    /**
     * Ambil 30 kata pertama dari konten sebagai ringkasan
     *
     * @param string $content
     * @return string
     */
    private function getContentSummary($content)
    {
        $words = explode(' ', strip_tags($content));
        $summary = implode(' ', array_slice($words, 0, 30));
        
        return $summary . (count($words) > 30 ? '...' : '');
    }

    /**
     * Format data berita untuk response
     *
     * @param \Illuminate\Database\Eloquent\Collection $news
     * @return array
     */
    private function formatNewsData($news)
    {
        return $news->map(function($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'category' => $article->category,
                'source' => $article->source,
                'summary' => $this->getContentSummary($article->content),
                'published_at' => $article->published_at
            ];
        })->toArray();
    }
}
