@extends('layout.admin')

@section('header', 'Manajemen Galeri')

@section('content')
<div class="grid md:grid-cols-3 gap-8">

     <div class="md:col-span-1">
          <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 sticky top-6">
               <h3 class="font-bold text-lg mb-4">Upload Foto Baru</h3>

               <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                         <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Foto</label>
                         <input type="file" name="image" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                         <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Max: 2MB.</p>
                    </div>

                    <div class="mb-4">
                         <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan (Caption)</label>
                         <input type="text" name="caption" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Contoh: Suasana malam minggu...">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-bold">
                         Upload Foto
                    </button>
               </form>
          </div>
     </div>

     <div class="md:col-span-2">
          <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
               <h3 class="font-bold text-lg mb-4">Daftar Foto ({{ $galleries->count() }})</h3>

               <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($galleries as $item)
                    <div class="relative group rounded-lg overflow-hidden border border-gray-200">
                         <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-32 object-cover">

                         <div class="p-2 bg-white">
                              <p class="text-xs text-gray-600 truncate">{{ $item->caption ?? '-' }}</p>
                         </div>

                         <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                              <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                                   @csrf @method('DELETE')
                                   <button class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">Hapus</button>
                              </form>
                         </div>
                    </div>
                    @endforeach
               </div>
          </div>
     </div>
</div>
@endsection