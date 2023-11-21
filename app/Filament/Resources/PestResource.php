<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PestResource\Pages;
use App\Filament\Resources\PestResource\RelationManagers;
use App\Models\Pest;
use App\Models\Vegetable;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PestResource extends Resource
{
    protected static ?string $navigationGroup = 'Vegetable Information';
    protected static ?string $model = Pest::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('vegetable')
                ->label('Vegetable Plant Name')
                ->options(Vegetable::pluck('name', 'id'))
                ->searchable()
                ->multiple(),
                TextInput::make('name')
                ->label('Pest'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vegetables.name')
                ->label('vegetable'),
                TextColumn::make('name')
                ->label('Pest Name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPests::route('/'),
            'create' => Pages\CreatePest::route('/create'),
            'edit' => Pages\EditPest::route('/{record}/edit'),
        ];
    }
}
