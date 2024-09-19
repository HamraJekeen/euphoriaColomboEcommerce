<?php

namespace App\Filament\Resources\OrderResource\Widgets;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Number; 
use Filament\Widgets\StatsOverviewWidget\Stat;

class orderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            stat::make('New Order',Order::query()->where('status', 'new')->count()),
            stat::make('Order processing',Order::query()->where('status', 'processing')->count()),
            stat::make('Order Shipped',Order::query()->where('status', 'shipped')->count()),
            stat::make('Order Delivered',Order::query()->where('status', 'delivered')->count()),
            
        ];
    }
}
