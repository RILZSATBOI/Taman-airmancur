@extends('layout.app')

@section('title', 'Apa Kata Pengunjung')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">

     <div class="text-center mb-12">
          <h1 class="text-3xl font-bold text-gray-900">Testimoni Pengunjung</h1>
          <p class="text-gray-500 mt-2">Pengalaman seru mereka di Taman Air Mancur Sri Baduga.</p>
     </div>

     @auth
     <div class="bg-blue-50 p-6 rounded-xl border border-blue-100 mb-12">
          <h3 class="font-bold text-lg text-blue-900 mb-4">Tulis Pengalaman Anda</h3>

          @if(session('success'))
          <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
               {{ session('success') }}
          </div>
          @endif

          <form action="{{ route('testimonials.store') }}" method="POST">
               @csrf
               <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rating Bintang</label>
                    <div class="flex gap-4">
                         @for($i=1; $i<=5; $i++)
                              <label class="flex items-center cursor-pointer">
                              <input type="radio" name="rating" value="{{ $i }}" class="mr-1 text-blue-600 focus:ring-blue-500" required>
                              <span class="text-yellow-500 font-bold text-lg">★ {{ $i }}</span>
                              </label>
                              @endfor
                    </div>
               </div>
               <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Komentar</label>
                    <textarea name="comment" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Ceritakan pengalaman seru Anda..." required></textarea>
               </div>
               <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">Kirim Ulasan</button>
          </form>
     </div>
     @else
     <div class="text-center mb-12">
          <p class="text-gray-600">Ingin menulis ulasan? <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Login dulu yuk!</a></p>
     </div>
     @endauth

     <div class="grid md:grid-cols-2 gap-6">
          @forelse($testimonials as $testi)
          <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
               <div class="flex items-center mb-4">
                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold">
                         {{ substr($testi->user->name, 0, 1) }}
                    </div>
                    <div class="ml-3">
                         <div class="font-bold text-gray-900">{{ $testi->user->name }}</div>
                         <div class="text-yellow-400 text-sm">
                              {{ str_repeat('★', $testi->rating) }}
                              <span class="text-gray-300">{{ str_repeat('★', 5 - $testi->rating) }}</span>
                         </div>
                    </div>
               </div>
               <p class="text-gray-600 italic">"{{ $testi->comment }}"</p>
               <div class="mt-4 text-xs text-gray-400">
                    {{ $testi->created_at->diffForHumans() }}
               </div>
          </div>
          @empty
          <div class="col-span-2 text-center py-12 text-gray-400">
               Belum ada testimoni yang ditampilkan. Jadilah yang pertama!
          </div>
          @endforelse
     </div>
</div>
@endsection