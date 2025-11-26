@extends('layout.admin')
@section('header', 'Moderasi Testimoni')

@section('content')
<div class="bg-white shadow rounded-lg overflow-hidden">
     <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
               <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Rating</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase w-1/2">Komentar</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
               </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
               @foreach($testimonials as $testi)
               <tr class="hover:bg-gray-50 {{ !$testi->is_approved ? 'bg-yellow-50' : '' }}">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $testi->user->name }}</td>
                    <td class="px-6 py-4 text-sm text-yellow-500 font-bold">★ {{ $testi->rating }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $testi->comment }}</td>
                    <td class="px-6 py-4 text-sm flex space-x-2">
                         @if(!$testi->is_approved)
                         <form action="{{ route('admin.testimonials.approve', $testi->id) }}" method="POST">
                              @csrf @method('PATCH')
                              <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">✓ Setuju</button>
                         </form>
                         @else
                         <span class="text-green-600 text-xs font-bold border border-green-200 px-2 py-1 rounded">Tayang</span>
                         @endif

                         <form action="{{ route('admin.testimonials.delete', $testi->id) }}" method="POST" onsubmit="return confirm('Hapus permanen?')">
                              @csrf @method('DELETE')
                              <button class="text-red-600 hover:text-red-800 text-xs font-bold underline px-2">Hapus</button>
                         </form>
                    </td>
               </tr>
               @endforeach
          </tbody>
     </table>
</div>
@endsection