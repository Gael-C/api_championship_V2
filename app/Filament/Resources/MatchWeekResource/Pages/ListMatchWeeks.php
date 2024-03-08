<?php

namespace App\Filament\Resources\MatchWeekResource\Pages;

use App\Filament\Resources\MatchWeekResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMatchWeeks extends ListRecords
{
    protected static string $resource = MatchWeekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
