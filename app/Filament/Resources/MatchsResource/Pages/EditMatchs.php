<?php

namespace App\Filament\Resources\MatchsResource\Pages;

use App\Filament\Resources\MatchsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMatchs extends EditRecord
{
    protected static string $resource = MatchsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
