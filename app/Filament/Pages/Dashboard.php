<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\RevenueOverview;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            RevenueOverview::class, // Add the Total Revenue Overview Widget
        ];
    }
}
