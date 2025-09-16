<?php

namespace App\Filament\Widgets;

use App\Models\Guest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GuestsCountWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Tamu', Guest::count())
                ->descriptionIcon('heroicon-m-user-group')
                ->description('Total tamu yang sudah mengisi form')
                ->color('success'),
        ];
    }
}
