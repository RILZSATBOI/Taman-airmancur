<!DOCTYPE html>
<html lang="id">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>@yield('title', 'Taman Air Mancur Sri Baduga')</title>

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-['Inter'] bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

     <nav x-data="{ open: false }" class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
               <div class="flex justify-between h-16 relative">

                    <div class="flex items-center">
                         <div class="shrink-0 flex items-center">
                              <a href="{{ url('/') }}" class="font-bold text-xl text-blue-600 flex items-center gap-2">
                                   TASB 
                              </a>
                         </div>
                    </div>

                    <div class="hidden sm:flex sm:space-x-8 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                         <a href="{{ url('/') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->is('/') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium transition">
                              Beranda
                         </a>
                         <a href="{{ url('/#jadwal') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium text-gray-500 hover:text-gray-700 transition">
                              Jadwal
                         </a>
                         <a href="{{ url('/#tiket') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium text-gray-500 hover:text-gray-700 transition">
                              Tiket
                         </a>
                         <a href="{{ url('/galeri') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('gallery.*') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium transition">
                              Galeri
                         </a>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                         @auth
                         <div class="relative" x-data="{ open: false }">
                              <button @click="open = !open" class="text-sm font-medium text-gray-700 flex items-center gap-2 hover:text-blue-600 transition">
                                   Halo, {{ Auth::user()->name }}
                                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                   </svg>
                              </button>

                              <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-50" style="display: none;" x-transition>
                                   @if(Auth::user()->role == 'admin')
                                   <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Panel Admin</a>
                                   @endif
                                   <a href="{{ route('order.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Tiket</a>

                                   <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Keluar</button>
                                   </form>
                              </div>
                         </div>
                         @else
                         <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900">Masuk</a>
                         <a href="{{ route('register') }}" class="text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 px-5 py-2 rounded-full transition shadow-md hover:shadow-lg">Daftar</a>
                         @endauth
                    </div>

                    <div class="-mr-2 flex items-center sm:hidden">
                         <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                   <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                   <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                         </button>
                    </div>
               </div>
          </div>

          <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t shadow-inner">
               <div class="pt-2 pb-3 space-y-1 px-2">
                    <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-700 bg-blue-50">Beranda</a>
                    <a href="{{ url('/#jadwal') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Jadwal</a>
                    <a href="{{ route('gallery.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Galeri</a>

                    <div class="border-t border-gray-200 mt-4 pt-4">
                         @auth
                         <div class="px-3 py-2 text-sm font-bold text-gray-500">Halo, {{ Auth::user()->name }}</div>
                         <a href="{{ route('order.history') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50">Riwayat Tiket</a>
                         @if(Auth::user()->role == 'admin')
                         <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50">Panel Admin</a>
                         @endif
                         <form method="POST" action="{{ route('logout') }}" class="mt-2">
                              @csrf
                              <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">Keluar</button>
                         </form>
                         @else
                         <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50">Masuk</a>
                         <a href="{{ route('register') }}" class="block px-3 py-2 mt-2 rounded-md text-base font-medium text-white bg-blue-600 text-center">Daftar Sekarang</a>
                         @endauth
                    </div>
               </div>
          </div>
     </nav>

     <main class="flex-grow">
          @yield('content')
     </main>

     <footer class="bg-slate-800 text-slate-300 py-16">
          <div class="container mx-auto px-6">
               <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                         <h4 class="text-xl font-semibold text-white mb-4">TamanAirMancur</h4>
                         <p class="text-slate-400">Menyajikan keindahan pertunjukan air mancur terbesar di Asia Tenggara, langsung di Purwakarta.</p>
                    </div>
                    <div>
                         <h4 class="text-xl font-semibold text-white mb-4">Navigasi Cepat</h4>
                         <ul class="space-y-2">
                              <li><a href="#tentang" class="hover:text-white">Tentang Kami</a></li>
                              <li><a href="#jadwal" class="hover:text-white">Jadwal</a></li>
                              <li><a href="#galeri" class="hover:text-white">Galeri</a></li>
                              <li><a href="#testimoni" class="hover:text-white">Testimoni</a></li>
                         </ul>
                    </div>
                    <div>
                         <h4 class="text-xl font-semibold text-white mb-4">Kontak</h4>
                         <ul class="space-y-2 text-slate-400">
                              <li>Lokasi: Taman Sri Baduga, Purwakarta</li>
                              <li>Email: info@tamanairmancur.com</li>
                              <li>Telepon: (0264) 123-456</li>
                         </ul>
                    </div>
               </div>
          </div>
     </footer>

</body>

</html>