<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Booking;
use App\Models\Vendor;

class TotalStatsWidget extends BaseWidget
{
    protected function getCards(): array
    {

        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('total_amount');
        $activeVendors = Vendor::where('is_active', true)->count();

        return [
            Card::make('Total Bookings', $totalBookings)
                ->icon('heroicon-o-clipboard')
                ->color('success')
                ->description('All-time bookings'),

            Card::make('Total Revenue', '$' . number_format($totalRevenue, 2)) // Format as currency
                ->description('Total revenue from all bookings')
                ->icon('heroicon-o-currency-dollar')
                ->color('success'),

            Card::make('Active Vendors', $activeVendors)
                ->icon('heroicon-o-users')
                ->color('info')
                ->description('Currently active vendors'),
        ];
    }
}
