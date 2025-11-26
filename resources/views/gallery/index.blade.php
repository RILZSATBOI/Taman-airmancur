@extends('layout.app')

@section('title', 'Galeri Foto')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
     <div class="text-center mb-12">
          <h1 class="text-3xl font-bold text-gray-900">Galeri Keindahan</h1>
          <p class="text-gray-500 mt-2">Dokumentasi momen terbaik di Taman Air Mancur Sri Baduga.</p>
     </div>

     @if($galleries->isEmpty())
     <div class="text-center py-20 text-gray-400 bg-gray-50 rounded-xl border border-dashed border-gray-300">
          Belum ada foto yang diunggah.
     </div>
     @else
     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          @foreach($galleries as $item)
          <div class="group relative overflow-hidden rounded-xl shadow-sm aspect-square bg-gray-100">
               <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->caption }}" class="object-cover w-full h-full transform group-hover:scale-110 transition duration-500">

               <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-4">
                    <p class="text-white text-sm font-medium truncate">{{ $item->caption ?? 'Tanpa Judul' }}</p>
               </div>
          </div>
          @endforeach
     </div>
     @endif
</div>
@endsection