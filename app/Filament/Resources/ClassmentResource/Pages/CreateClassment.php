<?php

namespace App\Filament\Resources\ClassmentResource\Pages;

use App\Models\Team;
use Filament\Actions;
use App\Models\League;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ClassmentResource;

class CreateClassment extends CreateRecord
{
    // use Createrecord\Concerns\HasWizard;
    protected static string $resource = ClassmentResource::class;

    protected function getSteps():array
    {
        return [
            Step::make('Détail du classement')
                ->schema([
                    TextInput::make('victoires')
                        ->required()
                        ->default(0),
                    TextInput::make('défaites')
                        ->required()
                        ->default(0),
                    TextInput::make('victoires')
                        ->required()
                        ->default(0),
                    TextInput::make('défaites')
                        ->required()
                        ->default(0),
                    TextInput::make('victoires')
                        ->required()
                        ->default(0),
                    TextInput::make('défaites')
                        ->required()
                        ->default(0),
                    TextInput::make('défaites')
                        ->required()
                        ->default(0),
                    Select::make('team_id')
                        ->label('Équipe')
                        ->options(Team::all()->pluck('name', 'id'))
                        ->required(),
                    Select::make('league_id')
                        ->label('Championnat')
                        ->options(League::all()->pluck('name', 'id'))
                        ->required(),
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
