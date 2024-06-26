<?php

namespace App\Filament\Resources\TeamResource\RelationManagers;

use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeaguesRelationManager extends RelationManager
{
    protected static string $relationship = 'leagues';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('creation')
                    ->required()
                    ->maxLength(4),
                Forms\Components\Select::make('last_champion')
                    ->required()
                    ->label('Dernier champion')
                    ->options(Team::all()->pluck('name', 'id')),
                Forms\Components\Select::make('most_successfull')
                    ->required()
                    ->label('Équipe la plus titrée')
                    ->options(Team::all()->pluck('name', 'id')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AssociateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DissociateAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DissociateBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
