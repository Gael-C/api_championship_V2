<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\League;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LeagueResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LeagueResource\RelationManagers;
use App\Filament\Resources\LeagueResource\RelationManagers\TeamsRelationManager;
use App\Filament\Resources\TeamResource\RelationManagers\LeaguesRelationManager;

class LeagueResource extends Resource
{
    protected static ?string $model = League::class;

    protected static ?string $modelLabel = 'Championnat';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('name')
                    ->label('Nom du championnat')
                    ->required(),
                TextInput::make('creation')
                    ->label('Création du championnat')
                    ->required(),
                Select::make('last_champion')
                    ->label('Champion en titre')
                    ->relationship('lastChampion', 'name')
                    ->required(),
                Select::make('most_successfull')
                    ->label('Équipe la plus titrée')
                    ->relationship('mostSuccesfull', 'name')
                    ->required(),
                FileUpload::make('logo')
                    ->disk('public')
                    ->directory('logo')
                    ->nullable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('logo')
                    ->disk('public'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TeamsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeagues::route('/'),
            'create' => Pages\CreateLeague::route('/create'),
            'edit' => Pages\EditLeague::route('/{record}/edit'),
        ];
    }
}
