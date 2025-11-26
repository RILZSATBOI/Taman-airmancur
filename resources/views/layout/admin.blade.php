<!DOCTYPE html>
<html lang="id">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Panel - Taman Air</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=bg-gray-100">

     <div class="flex min-h-screen">
          <aside class="w-64 bg-gray-900 text-white flex flex-col">
               <div class="h-16 flex items-center justify-center border-b border-gray-800 font-bold text-xl">
                    Panel Admin
               </div>
               <nav class="flex-1 px-2 py-4 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300' }}">
                         Dashboard
                    </a>
                    <a href="{{ route('admin.orders') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-800 {{ request()->routeIs('admin.orders') ? 'bg-gray-800 text-white' : 'text-gray-300' }}">
                         Manajemen Order
                    </a>
                    <a href="{{ route('admin.gallery') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-800 {{ request()->routeIs('admin.gallery') ? 'bg-gray-800 text-white' : 'text-gray-300' }}">
                         Manajemen Galeri
                    </a>
                    <a href="{{ route('home') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-800 mt-8 border-t border-gray-800">
                         &larr; Kembali ke Website
                    </a>
               </nav>
          </aside>

          <div class="flex-1 flex flex-col">
               <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6">
                    <h2 class="text-lg font-medium text-gray-900">@yield('header')</h2>
                    <div class="text-sm text-gray-500">Login sebagai: Administrator</div>
               </header>

               <main class="flex-1 p-6 overflow-y-auto">
                    @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                         {{ session('success') }}
                    </div>
                    @endif

                    @yield('content')
               </main>
          </div>
     </div>

</body>

</html>