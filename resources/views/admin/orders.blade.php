@extends('layout.admin')

@section('header', 'Manajemen Pesanan Tiket')

@section('content')
<div class="bg-white shadow rounded-lg overflow-hidden">
     <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
               <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Order ID</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Pemesan</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
               </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
               @foreach($orders as $order)
               <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-mono text-gray-900">{{ $order->order_code }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                         <div class="font-medium text-gray-900">{{ $order->user->name }}</div>
                         <div class="text-xs">{{ $order->user->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm font-bold text-gray-900">
                         Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                         @if($order->status == 'pending')
                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                         @elseif($order->status == 'paid')
                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Lunas</span>
                         @else
                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Batal</span>
                         @endif
                    </td>
                    <td class="px-6 py-4 text-sm">
                         @if($order->status == 'pending')
                         <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST" onsubmit="return confirm('Yakin verifikasi pembayaran ini menjadi LUNAS?')">
                              @csrf
                              @method('PATCH')
                              <button type="submit" class="text-white bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-xs font-bold shadow">
                                   ✅ Terima Pembayaran
                              </button>
                         </form>
                         @else
                         <span class="text-gray-400 text-xs italic">Selesai</span>
                         @endif
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
@endsection