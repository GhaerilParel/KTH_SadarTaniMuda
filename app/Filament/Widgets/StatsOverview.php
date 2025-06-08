<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Product;
use App\Models\ServiceDetail;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Jumlah semua user
        $totalUsers = User::count();

        // Jumlah produk
        $totalProducts = Product::count();

        // Jumlah detail produk (ServiceDetail)
        $totalServiceDetails = ServiceDetail::count();

        return [
            // Statistik jumlah user
            Stat::make('Total User', $totalUsers)
                ->description('Jumlah total user')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),

            // Statistik jumlah produk
            Stat::make('Total Produk', $totalProducts)
                ->description('Jumlah total produk')
                ->descriptionIcon('heroicon-o-cube')
                ->color('info'),

            // Statistik jumlah detail produk
            Stat::make('Total Detail Produk', $totalServiceDetails)
                ->description('Jumlah total detail produk')
                ->descriptionIcon('heroicon-o-clipboard-document-list')
                ->color('secondary'),
        ];
    }
}