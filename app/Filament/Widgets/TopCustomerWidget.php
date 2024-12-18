<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Booking;

class TopCustomerWidget extends Widget
{
    protected static ?string $heading = 'Top Customer';
    protected static string $view = 'filament.widgets.top-customer-widget';

    public function getTopCustomer()
    {
        return Booking::select('customer_name', 'total_amount')
            ->orderByDesc('total_amount')
            ->first();
    }
}
