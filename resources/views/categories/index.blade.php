<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategoriler - GadirMarket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold text-gray-900">Kategoriler</h1>
                <a href="{{ route('categories.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Yeni Kategori Ekle</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Kategori Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($categories as $category)
            <div class="bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-lg transition duration-200">
                <div class="p-6">
                    <!-- Kategori Başlığı -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 rounded-full" style="background-color: {{ $category->color }}"></div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $category->name }}</h3>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-400 hover:text-blue-600 transition duration-200">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-gray-400 hover:text-red-600 transition duration-200"
                                        onclick="return confirm('Bu kategoriyi silmek istediğinizden emin misiniz?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Kategori Açıklaması -->
                    @if($category->description)
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        {{ $category->description }}
                    </p>
                    @endif
                    
                    <!-- İstatistikler -->
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="flex items-center space-x-1">
                            <i class="fas fa-layer-group"></i>
                            <span>15 İçerik</span>
                        </span>
                        <span>{{ $category->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">
                    <i class="fas fa-folder-open"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Henüz kategori bulunmuyor</h3>
                <p class="text-gray-500 mb-6">İlk kategoriyi oluşturarak başlayın</p>
                <a href="{{ route('categories.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold inline-flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Kategori Oluştur</span>
                </a>
            </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-gray-500 text-sm">
                © 2024 Afetim. Tüm hakları saklıdır.
            </div>
        </div>
    </footer>
</body>
</html>