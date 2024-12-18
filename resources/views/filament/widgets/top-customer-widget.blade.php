<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow text-center">
    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3">Top Customer</h3>
    @if ($topCustomer = $this->getTopCustomer())
        <div class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            {{ $topCustomer->customer_name }}
        </div>
        <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Highest Booking: ${{ number_format($topCustomer->amount, 2) }}
        </div>
    @else
        <p class="text-sm text-gray-500 dark:text-gray-400">No bookings yet.</p>
    @endif
</div>
