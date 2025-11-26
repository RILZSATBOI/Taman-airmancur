@extends('layout.app')

@section('title', 'Riwayat Pesanan Anda')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
     <h1 class="text-2xl font-bold text-gray-900 mb-6">🎟️ Riwayat Tiket Saya</h1>

     @if($orders->isEmpty())
     <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
          <div class="text-gray-400 mb-4 text-6xl">📂</div>
          <h3 class="text-lg font-medium text-gray-900">Belum ada pesanan</h3>
          <p class="text-gray-500 mb-6">Anda belum membeli tiket apapun.</p>
          <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
               Beli Tiket Sekarang
          </a>
     </div>
     @else
     <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-200">
          <div class="overflow-x-auto">
               <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                         <tr>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Order</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail Tiket</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                         </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                         @foreach($orders as $order)
                         <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                   {{ $order->order_code }}
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                   {{ $order->created_at->format('d M Y, H:i') }} WIB
                              </td>

                              <td class="px-6 py-4 text-sm text-gray-700">
                                   @foreach($order->items as $item)
                                   <div class="mb-1">
                                        <span class="font-medium text-blue-600">{{ $item->ticket->name }}</span>
                                        <span class="text-gray-500">x {{ $item->quantity }}</span>
                                   </div>
                                   @endforeach
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                   Rp {{ number_format($order->total_price, 0, ',', '.') }}
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap">
                                   @if($order->status == 'paid')
                                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Lunas / Aktif
                                   </span>
                                   @elseif($order->status == 'pending')
                                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Menunggu Pembayaran
                                   </span>
                                   @else
                                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Dibatalkan
                                   </span>
                                   @endif
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
     </div>
     @endif
</div>
@endsection