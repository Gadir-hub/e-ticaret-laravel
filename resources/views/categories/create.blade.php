<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kategori - MarketGadir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Yeni Kategori</h1>
                    <p class="text-gray-600 text-sm mt-1">Yeni bir kategori oluşturun</p>
                </div>
                <a href="{{ route('categories.index') }}" 
                   class="text-gray-600 hover:text-gray-900 font-semibold flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Geri Dön</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Form -->
    <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                
                <!-- Kategori Adı -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Kategori Adı *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                           placeholder="Örnek: Teknoloji, Sağlık, Eğitim...">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Açıklama -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Açıklama
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                        placeholder="Kategori hakkında kısa bir açıklama..."></textarea>
                </div>
                
                <!-- Renk Seçimi -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kategori Rengi
                    </label>
                    <div class="flex space-x-3">
                        @php
                            $colors = ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6', '#EC4899'];
                        @endphp
                        @foreach($colors as $color)
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="{{ $color }}" 
                                   {{ $loop->first ? 'checked' : '' }} class="hidden">
                            <div class="w-8 h-8 rounded-full border-2 border-gray-300 hover:border-gray-400 transition duration-200"
                                 style="background-color: {{ $color }}"></div>
                        </label>
                        @endforeach
                    </div>
                </div>
                
                <!-- Butonlar -->
                <div class="flex items-center justify-between pt-6 border-t">
                    <a href="{{ route('categories.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition duration-200">
                        İptal
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
                        <i class="fas fa-save"></i>
                        <span>Kategoriyi Oluştur</span>
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>