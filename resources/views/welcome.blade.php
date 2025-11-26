@extends('layout.app')

@section('title', 'Beranda - Taman Air Mancur Sri Baduga')

@section('content')
<div class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-600 text-white overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/tamanair.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-85">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 sm:px-6 lg:px-8 flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg">
            Taman Air Mancur Sribaduga
        </h1>
        <p class="text-lg md:text-xl max-w-2xl mb-8 text-blue-100">
            Nikmati pertunjukan air mancur menari terbesar di Asia Tenggara. Perpaduan seni, teknologi, dan budaya dalam satu harmoni.
        </p>
        <div class="flex gap-4">
            <a href="#jadwal" class="bg-yellow-500 text-blue-900 px-8 py-3 rounded-full font-bold hover:bg-yellow-400 transition shadow-lg transform hover:-translate-y-1">
                Lihat Jadwal
            </a>
            <a href="{{ route('gallery.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-blue-900 transition">
                Lihat Galeri
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12 items-center">
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Ikon Kebanggaan Purwakarta</h2>
        <p class="text-gray-600 leading-relaxed mb-6">
            Taman Air Mancur Sri Baduga bukan sekadar tempat wisata, melainkan simbol kemajuan dan keindahan Purwakarta. Dengan teknologi laser dan air mancur yang menari mengikuti irama musik, kami menyajikan pengalaman tak terlupakan bagi Anda dan keluarga.
        </p>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-50 p-4 rounded-lg">
                <div class="text-2xl font-bold text-blue-600">3 Hektar</div>
                <div class="text-sm text-gray-500">Luas Situ Buleud</div>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg">
                <div class="text-2xl font-bold text-blue-600">1000+</div>
                <div class="text-sm text-gray-500">Nozzle Air Mancur</div>
            </div>
        </div>
    </div>
    <div class="rounded-2xl overflow-hidden shadow-xl h-80">
        <img src="{{ asset('images/sribaduga.jpg') }}" alt="Sri Baduga" class="w-full h-full object-cover">
    </div>
</div>

<div class="py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-16 items-center">

            <div class="relative h-[500px] md:h-[650px] rounded-3xl overflow-hidden shadow-2xl transform md:-rotate-2 hover:rotate-0 transition duration-500">
                <img src="{{ asset('images/behh.jpg') }}" alt="Keindahan Sri Baduga" class="absolute inset-0 w-full h-full object-cover scale-105 hover:scale-100 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/30 to-transparent"></div>
            </div>

            <div class="md:pl-8">
                <h2 class="text-4xl font-bold text-blue-900 mb-12 leading-tight">
                    Mengapa Harus Berkunjung ke Sri Baduga?
                </h2>

                <div class="space-y-10">
                    <div class="flex items-start group">
                        <span class="flex-shrink-0 text-yellow-500 font-extrabold text-2xl mr-6 group-hover:scale-110 transition">[ 01 ]</span>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 tracking-wider">Pertunjukan Kelas Dunia</h3>
                            <p class="text-gray-600 leading-relaxed text-lg">
                                Saksikan perpaduan magis antara air mancur menari, teknologi laser warna-warni, dan musik orkestra yang megah. Terbesar di Asia Tenggara!
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start group">
                        <span class="flex-shrink-0 text-yellow-500 font-extrabold text-2xl mr-6 group-hover:scale-110 transition">[ 02 ]</span>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 tracking-wider">Ikon Budaya & Sejarah</h3>
                            <p class="text-gray-600 leading-relaxed text-lg">
                                Berlokasi di Situ Buleud yang bersejarah, taman ini dihiasi patung Prabu Kian Santang yang megah, kental dengan nilai budaya Sunda.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start group">
                        <span class="flex-shrink-0 text-yellow-500 font-extrabold text-2xl mr-6 group-hover:scale-110 transition">[ 03 ]</span>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 tracking-wider">Wisata Keluarga Terjangkau</h3>
                            <p class="text-gray-600 leading-relaxed text-lg">
                                Nikmati hiburan spektakuler dengan harga tiket yang sangat ramah di kantong. Destinasi sempurna untuk akhir pekan keluarga.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="jadwal" class="py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Agenda Pertunjukan</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2">Jadwal Minggu Ini</h2>
        </div>

        <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-300 before:to-transparent">
            @foreach($schedules as $schedule)
            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">

                <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-white bg-blue-500 text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-6 bg-gray-50 rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:bg-blue-50 transition duration-300">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-0.5 rounded border border-blue-200">
                            {{ $schedule->day_of_week }}
                        </span>
                        <span class="text-gray-500 text-sm font-mono">
                            {{ substr($schedule->start_time, 0, 5) }} - {{ substr($schedule->end_time, 0, 5) }}
                        </span>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">{{ $schedule->title }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $schedule->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div id="tiket" class="py-20 bg-gray-50 relative">
    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#444cf7_1px,transparent_1px)] [background-size:16px_16px]"></div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Pilih Tiket Masuk</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8 px-4">
            @foreach($tickets as $index => $ticket)
            @php $isVip = $ticket->price >= 40000; @endphp

            <div class="relative flex flex-col {{ $isVip ? 'bg-gray-900 text-white' : 'bg-white text-gray-900' }} rounded-3xl shadow-xl overflow-hidden transform transition hover:-translate-y-2 duration-300 group">

                <div class="p-8 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold">{{ $ticket->name }}</h3>
                            <p class="{{ $isVip ? 'text-gray-400' : 'text-gray-500' }} text-sm mt-2 leading-relaxed">
                                {{ $ticket->description }}
                            </p>
                        </div>
                        @if($isVip)
                        <span class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded">VIP</span>
                        @endif
                    </div>

                    <div class="mt-8 flex items-baseline">
                        <span class="text-4xl font-extrabold tracking-tight">
                            Rp {{ number_format($ticket->price, 0, ',', '.') }}
                        </span>
                        <span class="ml-1 text-sm {{ $isVip ? 'text-gray-400' : 'text-gray-500' }}">/ pax</span>
                    </div>
                </div>

                <div class="relative h-4 w-full">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-6 h-6 bg-gray-50 rounded-full"></div>
                    <div class="absolute inset-x-0 top-1/2 border-t-2 border-dashed {{ $isVip ? 'border-gray-700' : 'border-gray-200' }}"></div>
                    <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-6 h-6 bg-gray-50 rounded-full"></div>
                </div>

                <div class="p-6 bg-opacity-50 {{ $isVip ? 'bg-gray-800' : 'bg-gray-50' }}">
                    <div class="flex justify-between items-center mb-4 text-sm {{ $isVip ? 'text-gray-400' : 'text-gray-500' }}">
                        <span>Stok: {{ $ticket->stock }}</span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Instant Confirm
                        </span>
                    </div>

                    @auth
                    <a href="{{ route('order.checkout', $ticket->id) }}" class="block w-full py-3 rounded-xl font-bold text-center transition {{ $isVip ? 'bg-yellow-500 text-blue-900 hover:bg-yellow-400' : 'bg-blue-600 text-white hover:bg-blue-700' }}">
                        Pesan Sekarang
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="block w-full py-3 rounded-xl font-bold text-center transition border-2 {{ $isVip ? 'border-gray-600 text-white hover:bg-gray-800' : 'border-gray-200 text-gray-600 hover:border-gray-900 hover:text-gray-900' }}">
                        Login →
                    </a>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/3 p-8 bg-gray-50">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Lokasi Kami</h3>
            <p class="text-gray-600 mb-4">
                <strong>Taman Air Mancur Sri Baduga</strong><br>
                Situ Buleud, Negeri Kidul, Kec. Purwakarta,<br>
                Kabupaten Purwakarta, Jawa Barat 41111
            </p>
            <div class="space-y-2">
                <a href="https://goo.gl/maps/xxxxx" target="_blank" class="flex items-center text-blue-600 font-medium hover:underline">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Buka di Google Maps
                </a>
            </div>
        </div>
        <div class="md:w-2/3 h-64 md:h-auto bg-gray-200">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.236370923262!2d107.44222731477082!3d-6.556551995257991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e6045fc1003%3A0x75d76c045402551a!2sTaman%20Air%20Mancur%20Sri%20Baduga!5e0!3m2!1sid!2sid!4v1679123456789!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

<div class="bg-blue-900 py-16 text-white relative overflow-hidden">
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-blue-800 opacity-50 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl font-bold">Apa Kata Mereka?</h2>
                <p class="text-blue-200 mt-2">Pengalaman pengunjung yang telah hadir.</p>
            </div>
            <a href="{{ route('testimonials.index') }}" class="text-yellow-400 hover:text-yellow-300 font-medium mt-4 md:mt-0">Lihat Semua Ulasan &rarr;</a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($testimonials as $testi)
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl border border-white/20">
                <div class="flex items-center mb-4">
                    <div class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center text-blue-900 font-bold">
                        {{ substr($testi->user->name, 0, 1) }}
                    </div>
                    <div class="ml-3">
                        <div class="font-bold">{{ $testi->user->name }}</div>
                        <div class="text-yellow-400 text-xs">★ {{ $testi->rating }}/5</div>
                    </div>
                </div>
                <p class="text-blue-100 text-sm italic">"{{ $testi->comment }}"</p>
            </div>
            @empty
            <div class="col-span-3 text-center text-blue-200 italic">Belum ada testimoni terbaru.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection