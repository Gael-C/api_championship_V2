<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Team;
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
use App\Filament\Resources\TeamResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Filament\Resources\TeamResource\RelationManagers\LeaguesRelationManager;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $modelLabel = 'Équipes';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations générales')
                ->collapsible()
                ->schema([
                    TextInput::make('slug')
                        ->required(), 
                    TextInput::make('name')
                        ->label('Nom')
                        ->required(), 
                    TextInput::make('nickname')
                        ->label('Surnom')
                        ->required(), 
                    TextInput::make('foundation')
                        ->label('Création')
                        ->required(),
                    TextInput::make('stade')
                        ->required(), 
                    TextInput::make('capacity')
                        ->label('Capacité')    
                        ->required(), 
                ])->columnSpan(2)->columns(2),
                Section::make('Réseaux sociaux')
                ->collapsible()
                ->schema([
                    TextInput::make('website')
                        ->label('Site web')
                        ->required(), 
                    TextInput::make('facebook')
                        ->nullable(),
                    TextInput::make('twitter')
                        ->nullable(), 
                    TextInput::make('instagram')
                        ->nullable(), 
                    TextInput::make('youtube')
                        ->nullable(), 
                ])->columnSpan(2)->columns(2),
                Section::make('Logo')
                ->collapsible()
                ->schema([
                    FileUpload::make('logo')
                        ->disk('public')
                        ->directory('logo')
                        ->nullable(),
                ])->columnSpan(2),
                Section::make('Championnat')
                ->collapsible()
                ->schema([
                    Select::make('leagues')
                        ->relationship('leagues', 'name')
                        ->multiple()
                        ->label('Championnat')
                        ->preload()
                ])->columnSpan(2),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                TextColumn::make('leagues.name')
                    ->label('Championnat')
                    ->badge()
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
            LeaguesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
