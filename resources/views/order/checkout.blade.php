@extends('layout.app')

@section('title', 'Checkout Tiket')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12">
     <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">

          <div class="bg-gray-900 px-6 py-4">
               <h1 class="text-xl font-bold text-white">Konfirmasi Pesanan</h1>
          </div>

          <div class="p-8 grid md:grid-cols-2 gap-8">
               <div>
                    <h2 class="text-gray-500 text-sm font-bold uppercase tracking-wide mb-4">Detail Tiket</h2>
                    <div class="bg-blue-50 rounded-lg p-6 border border-blue-100">
                         <h3 class="text-2xl font-bold text-blue-900">{{ $ticket->name }}</h3>
                         <p class="text-gray-600 mt-2">{{ $ticket->description }}</p>
                         <div class="mt-4 pt-4 border-t border-blue-200 flex justify-between items-center">
                              <span class="text-sm text-blue-800">Harga Satuan</span>
                              <span class="font-bold text-lg text-blue-900">Rp {{ number_format($ticket->price, 0, ',', '.') }}</span>
                         </div>
                    </div>
               </div>

               <div>
                    <form action="{{ route('order.store', $ticket->id) }}" method="POST" x-data="{ qty: 1, price: {{ $ticket->price }} }">
                         @csrf

                         <h2 class="text-gray-500 text-sm font-bold uppercase tracking-wide mb-4">Jumlah Pesanan</h2>

                         <div class="mb-6">
                              <label class="block text-sm font-medium text-gray-700 mb-2">Mau beli berapa tiket?</label>
                              <div class="flex items-center border border-gray-300 rounded-md w-32">
                                   <button type="button" @click="if(qty > 1) qty--" class="px-3 py-2 text-gray-600 hover:bg-gray-100">-</button>
                                   <input type="number" name="quantity" x-model="qty" class="w-full text-center border-none focus:ring-0" min="1" max="10" readonly>
                                   <button type="button" @click="if(qty < 10) qty++" class="px-3 py-2 text-gray-600 hover:bg-gray-100">+</button>
                              </div>
                         </div>

                         <div class="bg-gray-50 p-4 rounded-lg mb-6">
                              <div class="flex justify-between items-center">
                                   <span class="text-gray-600">Total Bayar:</span>
                                   <span class="text-2xl font-bold text-gray-900" x-text="'Rp ' + (qty * price).toLocaleString('id-ID')"></span>
                              </div>
                         </div>

                         <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-md">
                              Bayar Sekarang
                         </button>

                         <a href="{{ route('home') }}" class="block text-center mt-4 text-sm text-gray-500 hover:text-gray-800">
                              Batal & Kembali
                         </a>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection