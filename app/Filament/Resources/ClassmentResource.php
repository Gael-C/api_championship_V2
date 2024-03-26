<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Classment;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ClassmentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClassmentResource\RelationManagers;
use Filament\Forms\Components\Section;

class ClassmentResource extends Resource
{
    protected static ?string $model = Classment::class;

    protected static ?string $modelLabel = 'Classement';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Matchs')
                    ->collapsible()
                    ->schema([
                        TextInput::make('victoires')
                            ->required(),
                        TextInput::make('défaites')
                            ->required(),
                        TextInput::make('nuls')
                            ->required(),
                    ])->columnSpan(2),
                Section::make('Points marqués')
                    ->collapsible()
                    ->schema([
                        TextInput::make('pour')
                            ->required(),
                        TextInput::make('contre')
                            ->required(),
                        TextInput::make('goal_average')
                            ->label('Goal average')
                            ->required(),
                    ])->columnSpan(2),
                Section::make('Classement')
                    ->collapsible()
                    ->schema([
                        TextInput::make('bonus')
                            ->required(),
                        TextInput::make('points')
                            ->required(),
                        TextInput::make('classement')
                            ->required(),
                    ])->columnSpan(2),
                Section::make('Équipe et championnat')
                    ->collapsible()
                    ->schema([
                        Select::make('team_id')
                            ->label('Équipe')
                            ->relationship('team', 'name')
                            ->required(),
                        Select::make('league_id')
                            ->label('Championnat')
                            ->relationship('league', 'name')
                            ->required(),
                    ])->columnSpan(2),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('team_id')
                    ->label('Équipe')
                    ->searchable(),
                TextColumn::make('league_id')
                    ->searchable(),
                TextColumn::make('created_at')
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
            'index' => Pages\ListClassments::route('/'),
            'create' => Pages\CreateClassment::route('/create'),
            'edit' => Pages\EditClassment::route('/{record}/edit'),
        ];
    }
}
