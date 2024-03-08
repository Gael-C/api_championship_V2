<?php

namespace App\Filament\Resources\ClassmentResource\Pages;

use App\Filament\Resources\ClassmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClassments extends ListRecords
{
    protected static string $resource = ClassmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
