<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Booking;

class RecentBookingsWidget extends Widget
{
    protected static ?string $heading = 'Recent Bookings Overview';

    // Explicitly declare $view with a string type
    protected static string $view = 'filament.widgets.recent-bookings-widget';

    public function getRecentBookings()
    {
        return Booking::latest()->take(5)->get();
    }
}
