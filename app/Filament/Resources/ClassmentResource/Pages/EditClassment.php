<?php

namespace App\Filament\Resources\ClassmentResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ClassmentResource;

class EditClassment extends EditRecord
{
    protected static string $resource = ClassmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array 
    { 
        return $data; 
    } 
 
    protected function handleRecordUpdate(Model $record, array $data): Model 
    { 
        $record->update($data); 
 
        return $record; 
    } 
}
