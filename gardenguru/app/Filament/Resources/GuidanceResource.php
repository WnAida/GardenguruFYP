<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuidanceResource\Pages;
use App\Filament\Resources\GuidanceResource\RelationManagers;
use App\Models\Guidance;
use App\Models\Vegetable;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class GuidanceResource extends Resource
{
    protected static ?string $model = Guidance::class;

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

                Textarea::make('name')
                    ->label('Guidance'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Guidances'),
                // TextColumn::make('vegetable.name')
                // ->label('Vegetable Plant Name'),

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
            'index' => Pages\ListGuidances::route('/'),
            'create' => Pages\CreateGuidance::route('/create'),
            'edit' => Pages\EditGuidance::route('/{record}/edit'),
        ];
    }
}
