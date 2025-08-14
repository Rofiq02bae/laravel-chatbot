<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title ?? 'Artikel Berita' }} | Berita Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation/Header Bar -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-900">📰 Berita Indonesia</h1>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            Beranda
                        </a>
                        <a href="{{ url('/chatbot') }}" class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            🤖 Chatbot
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8 lg:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-150 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                {{ ucfirst($news->category ?? 'Berita') }}
                            </span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate">
                                Artikel
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Article Content -->
            <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Category Badge -->
                <div class="px-6 pt-6">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 uppercase tracking-wide">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $news->category ?? 'Umum' }}
                    </span>
                </div>

                <!-- Article Header -->
                <header class="px-6 py-4">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-4">
                        {{ $news->title ?? 'Judul Berita' }}
                    </h1>
                    
                    <!-- Meta Information -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-sm text-gray-600 mb-6">
                        <div class="flex items-center space-x-4 mb-2 sm:mb-0">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                <time datetime="{{ $news->published_at ?? now() }}">
                                    {{ \Carbon\Carbon::parse($news->published_at ?? now())->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                </time>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $news->source ?? 'Redaksi' }}</span>
                            </div>
                        </div>
                        <div class="flex items-center text-xs">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($news->published_at ?? now())->locale('id')->diffForHumans() }}</span>
                        </div>
                    </div>
                </header>

                <!-- Featured Image -->
                <div class="relative">
                    <img 
                        src="https://via.placeholder.com/800x400/e5e7eb/6b7280?text=Gambar+Berita" 
                        alt="{{ $news->title ?? 'Gambar Berita' }}"
                        class="w-full h-64 sm:h-80 lg:h-96 object-cover"
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>

                <!-- Article Body -->
                <div class="px-6 py-8">
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-800 leading-relaxed">
                            @if(isset($news->content))
                                @foreach(explode("\n\n", $news->content) as $paragraph)
                                    @if(trim($paragraph))
                                        <p class="mb-6 text-justify">{{ trim($paragraph) }}</p>
                                    @endif
                                @endforeach
                            @else
                                <p class="mb-6 text-justify">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <p class="mb-6 text-justify">
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                                <p class="mb-6 text-justify">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Article Footer -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex flex-wrap items-center justify-between">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Sumber: {{ $news->source ?? 'Redaksi' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Navigation Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ url()->previous() }}" 
                   class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Kembali
                </a>
                
                <a href="{{ url('/') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Kembali ke Berita Lainnya
                </a>

                <a href="{{ url('/chatbot') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                    </svg>
                    🤖 Tanya Chatbot
                </a>
            </div>

            <!-- Related Articles Section (Optional) -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Berita Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Placeholder for related articles -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/300x200/e5e7eb/6b7280?text=Berita+Terkait" alt="Berita Terkait" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full mb-2">Teknologi</span>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 hover:text-blue-600 cursor-pointer transition duration-150">
                                Berita Teknologi Terbaru
                            </h3>
                            <p class="text-gray-600 text-sm">Ringkasan berita teknologi yang menarik untuk dibaca...</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/300x200/e5e7eb/6b7280?text=Berita+Terkait" alt="Berita Terkait" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full mb-2">Kesehatan</span>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 hover:text-green-600 cursor-pointer transition duration-150">
                                Tips Kesehatan Terkini
                            </h3>
                            <p class="text-gray-600 text-sm">Informasi kesehatan yang berguna untuk kehidupan sehari-hari...</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://via.placeholder.com/300x200/e5e7eb/6b7280?text=Berita+Terkait" alt="Berita Terkait" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full mb-2">Politik</span>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 hover:text-red-600 cursor-pointer transition duration-150">
                                Update Politik Nasional
                            </h3>
                            <p class="text-gray-600 text-sm">Perkembangan politik terbaru yang perlu diketahui...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-600">© 2025 Berita Indonesia. Semua hak dilindungi.</p>
                <p class="text-sm text-gray-500 mt-2">Dikembangkan dengan ❤️ menggunakan Laravel & Tailwind CSS</p>
            </div>
        </div>
    </footer>
</body>
</html>
