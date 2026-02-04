<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="text-center">
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                Total Pendapatan
            </div>
            <div class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $totalRevenue }}
            </div>
        </div>
        
        <div class="text-center">
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                Jumlah Transaksi
            </div>
            <div class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ number_format($totalTransactions) }}
            </div>
        </div>
        
      
    </div>
</div>