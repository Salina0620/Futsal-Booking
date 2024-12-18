<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Booking;

class RevenueChartWidget extends ApexChartWidget
{
    protected static ?string $chartId = 'revenueChart';

    protected static ?string $heading = 'Revenue Over Time';

    protected static ?string $pollingInterval = '10s'; // Poll every 10 seconds

    protected function getOptions(): array
    {
        // Prepare monthly revenue data
        $dailyRevenue = Booking::selectRaw('strftime("%m-%d", created_at) as day, SUM(total_amount) as revenue')
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('revenue', 'day');

        return [
            'chart' => [
                'type' => 'line',
                'height' => 350,
            ],
            'series' => [
                [
                    'name' => 'Revenue',
                    'data' => array_values($dailyRevenue->toArray()),
                ],
            ],
            'xaxis' => [
                'categories' => array_keys($dailyRevenue->toArray()),
                'title' => ['text' => 'Day'],
            ],
            'yaxis' => [
                'title' => ['text' => 'Revenue ($)'],
            ],
            'colors' => ['#10B981'],
        ];
    }
}
