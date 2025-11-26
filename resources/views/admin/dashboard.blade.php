@extends('layout.admin')

@section('header', 'Dashboard Overview')

@section('content')
<!-- BAGIAN STATISTIK -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
     <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <div class="text-sm font-medium text-gray-500">Total Pendapatan</div>
          <div class="mt-2 text-3xl font-bold text-gray-900">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
     </div>
 
     <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <div class="text-sm font-medium text-gray-500">Order Pending</div>
          <div class="mt-2 text-3xl font-bold text-yellow-600">{{ $pendingOrders }}</div>
     </div>

     <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <div class="text-sm font-medium text-gray-500">Total Tiket Terjual</div>
          <div class="mt-2 text-3xl font-bold text-blue-600">{{ $totalOrders }}</div>
     </div>

     <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <div class="text-sm font-medium text-gray-500">Total User</div>
          <div class="mt-2 text-3xl font-bold text-gray-900">{{ $totalUsers }}</div>
     </div>
</div>

<!-- BAGIAN GRAFIK & ORDER TERBARU -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

     <!-- Grafik -->
     <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Pendapatan (7 Hari Terakhir)</h3>
          <div class="relative h-72 w-full">
               <canvas id="revenueChart"></canvas>
          </div>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script>
          // --- LANGKAH 1: AMBIL DATA DARI PHP ---
          // Data disimpan dulu ke variabel Javascript biar rapi.
          const chartLabels = {
               !!json_encode($chartLabels) !!
          };
          const chartValues = {
               !!json_encode($chartValues) !!
          };

          // --- LANGKAH 2: SETUP CHART ---
          const ctx = document.getElementById('revenueChart');

          new Chart(ctx, {
               type: 'line',
               data: {
                    // Panggil variabel Javascript yang sudah kita buat di atas
                    labels: chartLabels,

                    datasets: [{
                         label: 'Pendapatan (Rp)',
                         // Panggil variabel Javascript data angka
                         data: chartValues,

                         borderColor: '#2563eb',
                         backgroundColor: 'rgba(37, 99, 235, 0.1)',
                         borderWidth: 2,
                         fill: true,
                         tension: 0.4,
                         pointRadius: 4,
                         pointHoverRadius: 6
                    }]
               },
               options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                         legend: {
                              display: false
                         },
                         tooltip: {
                              callbacks: {
                                   label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) label += ': ';
                                        if (context.parsed.y !== null) {
                                             label += new Intl.NumberFormat('id-ID', {
                                                  style: 'currency',
                                                  currency: 'IDR'
                                             }).format(context.parsed.y);
                                        }
                                        return label;
                                   }
                              }
                         }
                    },
                    scales: {
                         y: {
                              beginAtZero: true,
                              ticks: {
                                   callback: function(value) {
                                        return 'Rp ' + value.toLocaleString('id-ID');
                                   }
                              },
                              grid: {
                                   borderDash: [2, 4],
                                   color: '#e5e7eb'
                              }
                         },
                         x: {
                              grid: {
                                   display: false
                              }
                         }
                    }
               }
          });
     </script>

     <!-- List Order Terbaru -->
     <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <h3 class="text-lg font-bold text-gray-800 mb-4">Pesanan Terbaru</h3>
          <div class="flow-root">
               <ul role="list" class="-my-5 divide-y divide-gray-200">
                    @forelse($latestOrders as $order)
                    <li class="py-4">
                         <div class="flex items-center space-x-4">
                              <div class="flex-1 min-w-0">
                                   <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $order->user->name }}
                                   </p>
                                   <p class="text-sm text-gray-500 truncate">
                                        {{ $order->order_code }}
                                   </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                   Rp {{ number_format($order->total_price, 0, ',', '.') }}
                              </div>
                         </div>
                    </li>
                    @empty
                    <li class="py-4 text-gray-500 text-sm">Belum ada pesanan masuk.</li>
                    @endforelse
               </ul>
               <div class="mt-6">
                    <a href="{{ route('admin.orders') }}" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                         Lihat Semua
                    </a>
               </div>
          </div>
     </div>
</div>

</script>
@endsection