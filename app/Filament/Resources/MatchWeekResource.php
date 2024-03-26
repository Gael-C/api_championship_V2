<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\MatchWeek;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MatchWeekResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MatchWeekResource\RelationManagers;
use Filament\Forms\Components\Select;

class MatchWeekResource extends Resource
{
    protected static ?string $model = MatchWeek::class;

    protected static ?string $modelLabel = 'Journée';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('match_week_number')
                    ->label('Journée')
                    ->required(),
                Select::make('season_id')
                    ->label('Saison')
                    ->relationship('seasons', 'season')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('match_week_number')
                    ->searchable(),
                TextColumn::make('season_id'),
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
            'index' => Pages\ListMatchWeeks::route('/'),
            'create' => Pages\CreateMatchWeek::route('/create'),
            'edit' => Pages\EditMatchWeek::route('/{record}/edit'),
        ];
    }
}
