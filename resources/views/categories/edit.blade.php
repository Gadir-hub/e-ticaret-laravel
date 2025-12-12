<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Düzenle - Afetim</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Kategori Düzenle</h1>
                    <p class="text-gray-600 text-sm mt-1">{{ $category->name }} kategori bilgilerini güncelleyin</p>
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
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Kategori Adı -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Kategori Adı *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $category->name) }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                           placeholder="Kategori adını girin">
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
                        placeholder="Kategori hakkında kısa bir açıklama...">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Renk Seçimi -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kategori Rengi *
                    </label>
                    <div class="flex space-x-3">
                        @php
                            $colors = ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6', '#EC4899', '#06B6D4', '#84CC16'];
                        @endphp
                        @foreach($colors as $color)
                        <label class="cursor-pointer">
                            <input type="radio" name="color" value="{{ $color }}" 
                                   {{ old('color', $category->color) == $color ? 'checked' : '' }} class="hidden">
                            <div class="w-8 h-8 rounded-full border-2 transition duration-200
                                {{ old('color', $category->color) == $color ? 'border-gray-800 scale-110' : 'border-gray-300 hover:border-gray-400' }}"
                                 style="background-color: {{ $color }}"></div>
                        </label>
                        @endforeach
                    </div>
                    @error('color')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori Bilgileri -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <h3 class="font-semibold text-gray-700 mb-2">Kategori Bilgileri</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                        <div>
                            <span class="font-medium">Oluşturulma:</span>
                            <p>{{ $category->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                        <div>
                            <span class="font-medium">Son Güncelleme:</span>
                            <p>{{ $category->updated_at->format('d.m.Y H:i') }}</p>
                        </div>
                        <div>
                            <span class="font-medium">Slug:</span>
                            <p class="text-blue-600">{{ $category->slug }}</p>
                        </div>
                        <div>
                            <span class="font-medium">ID:</span>
                            <p>#{{ $category->id }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Butonlar -->
                <div class="flex items-center justify-between pt-6 border-t">
                    <div class="flex space-x-3">
                        <a href="{{ route('categories.index') }}" 
                           class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition duration-200">
                            İptal
                        </a>
                        <button type="button"
                                onclick="if(confirm('Bu kategoriyi silmek istediğinizden emin misiniz?')) { document.getElementById('delete-form').submit(); }"
                                class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
                            <i class="fas fa-trash"></i>
                            <span>Sil</span>
                        </button>
                    </div>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-200 flex items-center space-x-2">
                        <i class="fas fa-save"></i>
                        <span>Değişiklikleri Kaydet</span>
                    </button>
                </div>
            </form>

            <!-- Silme Formu -->
            <form id="delete-form" action="{{ route('categories.destroy', $category) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </main>

    <!-- Success/Error Mesajları -->
    @if(session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
            <div class="flex items-center space-x-2">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif
</body>
</html>