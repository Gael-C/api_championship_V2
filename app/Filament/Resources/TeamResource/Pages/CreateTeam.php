<?php

namespace App\Filament\Resources\TeamResource\Pages;

use Filament\Actions;
use App\Models\League;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TeamResource;
use Filament\Actions\Concerns\HasWizard;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    // use Createrecord\Concerns\HasWizard;
    protected static string $resource = TeamResource::class;

    protected function getSteps(): array 
    { 
        return [ 
            Step::make('Information') 
                ->schema([ 
                TextInput::make('slug')
                    ->required(), 
                TextInput::make('name')
                    ->required(), 
                TextInput::make('nickname')
                    ->required(), 
                TextInput::make('foundation')
                    ->required(),
                TextInput::make('stade')
                    ->required(), 
                TextInput::make('capacity')
                    ->required(), 
                FileUpload::make('logo')
                    ->nullable(),
                ]),
            Step::make('Réseaux sociaux')
                ->schema([
                TextInput::make('website')
                    ->required(), 
                TextInput::make('facebook')
                    ->nullable(),
                TextInput::make('twitter')
                    ->nullable(), 
                TextInput::make('instagram')
                    ->nullable(), 
                TextInput::make('youtube')
                    ->nullable(), 
                ]),
            Step::make('Championnat')
                ->schema([
                Select::make('leagues')
                    ->relationship(name:'leagues ', titleAttribute:'name')
                    ->preload()
                ])

 
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
