<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-4xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-900">📰 Portal Berita</h1>
                <a href="{{ route('news.index') }}" 
                   class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                    ← Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 py-8">
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Article Header -->
            <header class="p-6 border-b border-gray-200">
                <!-- Category Badge -->
                <div class="mb-4">
                    <span class="inline-block px-3 py-1 text-sm font-semibold text-white rounded-full
                        @if($news->category == 'politik') bg-red-500
                        @elseif($news->category == 'teknologi') bg-blue-500
                        @elseif($news->category == 'kesehatan') bg-green-500
                        @elseif($news->category == 'olahraga') bg-orange-500
                        @elseif($news->category == 'ekonomi') bg-purple-500
                        @elseif($news->category == 'pendidikan') bg-indigo-500
                        @elseif($news->category == 'hiburan') bg-pink-500
                        @elseif($news->category == 'lingkungan') bg-teal-500
                        @elseif($news->category == 'budaya') bg-yellow-500
                        @else bg-gray-500
                        @endif">
                        {{ ucfirst($news->category) }}
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4">
                    {{ $news->title }}
                </h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-4 text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <time>{{ \Carbon\Carbon::parse($news->published_at)->format('d F Y, H:i') }}</time>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ $news->source }}</span>
                    </div>
                </div>
            </header>

            <!-- Article Content -->
            <div class="p-6">
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
        </article>

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <a href="{{ route('news.index') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Berita Lainnya
            </a>
        </div>
    </main>
</body>
</html>
