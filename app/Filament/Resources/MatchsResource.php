<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Matchs;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MatchsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MatchsResource\RelationManagers;
use App\Models\Team;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class MatchsResource extends Resource
{
    protected static ?string $model = Matchs::class;

    protected static ?string $modelLabel = 'Matchs';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Domicile')
                ->collapsible()
                ->schema([
                    Select::make('home_team_id')
                        ->label('Équipe')
                        ->relationship('homeTeam', 'name'),
                    TextInput::make('home_team_result')
                        ->label('Points')
                        ->numeric()
                        ->required(),
                    TextInput::make('home_team_tries')
                        ->label('Éssais')
                        ->numeric()
                        ->required(),
                ])->columnSpan(2),
                Section::make('Extérieur')
                ->collapsible()
                ->schema([
                    Select::make('away_team_id')
                        ->label('Équipe')
                        ->relationship('awayTeam', 'name'),
                    TextInput::make('away_team_result')
                        ->label('Points')
                        ->numeric()
                        ->required(),
                    TextInput::make('away_team_tries')
                        ->label('Éssais')
                        ->numeric()
                        ->required(),
                ])->columnSpan(2),
                Section::make('Championnat')
                ->schema([
                    Select::make('league_id')
                        ->label('Championnat')
                        ->relationship('league', 'name'),
                ])->columnSpan(2),
                Section::make('Journée')
                ->schema([
                    Select::make('matchweek')
                        ->label('Journée')
                        ->relationship('matchWeeks', 'match_week_number')
                        ->preload()
                ])->columnSpan(2),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('homeTeam.name')
                    ->label('Domicile ')
                    ->searchable(),
                TextColumn::make('home_team_result')
                    ->label('Points'),
                TextColumn::make('home_team_tries')
                    ->label('Éssais'),
                TextColumn::make('awayTeam.name')
                    ->label('Extérieur'),
                TextColumn::make('away_team_result')
                    ->label('Points'),
                TextColumn::make('away_team_tries')
                    ->label('Éssais'),
                TextColumn::make('league.name')
                    ->label('Championnat')
                    ->searchable(),
                TextColumn::make('matchWeeks.match_week_number')
                    ->label('Journée')
                    ->searchable(),

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMatchs::route('/'),
            'create' => Pages\CreateMatchs::route('/create'),
            'edit' => Pages\EditMatchs::route('/{record}/edit'),
        ];
    }
}
