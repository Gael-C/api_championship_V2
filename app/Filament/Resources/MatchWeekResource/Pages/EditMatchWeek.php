<?php

namespace App\Filament\Resources\MatchWeekResource\Pages;

use App\Filament\Resources\MatchWeekResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMatchWeek extends EditRecord
{
    protected static string $resource = MatchWeekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
