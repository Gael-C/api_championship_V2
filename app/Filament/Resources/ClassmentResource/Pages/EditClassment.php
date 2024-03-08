<?php

namespace App\Filament\Resources\ClassmentResource\Pages;

use App\Filament\Resources\ClassmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassment extends EditRecord
{
    protected static string $resource = ClassmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
