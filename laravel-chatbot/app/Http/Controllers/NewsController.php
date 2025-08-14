<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar semua berita
     */
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(10);
        return view('news.index', compact('news'));
    }

    /**
     * Menampilkan artikel berita berdasarkan ID
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
}
