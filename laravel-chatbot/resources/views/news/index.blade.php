<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-gray-900">📰 Portal Berita Indonesia</h1>
            <p class="text-gray-600 mt-2">Berita terkini dan terpercaya</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($news as $article)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Category Badge -->
                    <div class="p-4 pb-0">
                        <span class="inline-block px-3 py-1 text-xs font-semibold text-white rounded-full
                            @if($article->category == 'politik') bg-red-500
                            @elseif($article->category == 'teknologi') bg-blue-500
                            @elseif($article->category == 'kesehatan') bg-green-500
                            @elseif($article->category == 'olahraga') bg-orange-500
                            @elseif($article->category == 'ekonomi') bg-purple-500
                            @elseif($article->category == 'pendidikan') bg-indigo-500
                            @elseif($article->category == 'hiburan') bg-pink-500
                            @elseif($article->category == 'lingkungan') bg-teal-500
                            @elseif($article->category == 'budaya') bg-yellow-500
                            @else bg-gray-500
                            @endif">
                            {{ ucfirst($article->category) }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-4">
                        <h2 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">
                            {{ $article->title }}
                        </h2>
                        
                        <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                            {{ Str::limit(strip_tags($article->content), 150) }}
                        </p>

                        <!-- Meta Info -->
                        <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                            <span>{{ $article->source }}</span>
                            <time>{{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</time>
                        </div>

                        <!-- Read More Button -->
                        <a href="{{ route('news.show', $article->id) }}" 
                           class="inline-block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-gray-400 text-6xl mb-4">📰</div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Berita</h3>
                    <p class="text-gray-500">Tidak ada berita yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
            <div class="mt-12">
                {{ $news->links() }}
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-16">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} Portal Berita Indonesia. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</body>
</html>
