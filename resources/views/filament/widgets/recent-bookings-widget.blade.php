<div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-4">Recent Bookings</h3>
    <div class="space-y-4">
        @forelse ($this->getRecentBookings() as $booking)
            <div class="flex items-center justify-between p-3 bg-gray-100 dark:bg-gray-700 rounded-md">
                <div>
                    <div class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                        {{ $booking->customer_name }}
                    </div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        Booked on {{ $booking->created_at->format('M d, Y h:i A') }}
                    </div>
                </div>
                <div class="text-lg font-bold text-green-500">
                    ${{ number_format($booking->total_amount, 2) }}
                </div>
            </div>
        @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">No recent bookings available.</p>
        @endforelse
    </div>
</div>
