<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VegetableResource\Pages;
use App\Filament\Resources\VegetableResource\RelationManagers;
use App\Models\Vegetable;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;

class VegetableResource extends Resource
{
    protected static ?string $navigationGroup = 'Vegetable Information';
    protected static ?string $model = Vegetable::class;

    protected static ?string $navigationIcon = 'heroicon-o-database';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TextInput::make('user.created_at'),
                FileUpload::make('photo')
                    ->disk('public')
                    ->visibility('public')
                    ->image(),
                    
                TextInput::make('name'),
                TextArea::make('description'),
                // TextArea::make('guidances.name')
                // ->label('Guidance'),
                TextArea::make('note'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Vegetable Name'),
                TextColumn::make('description')->limit(15),
                // TextColumn::make('profile_photo_path')
                // ->limit(10),
                // TextColumn::make('note'),
                // TextColumn::make('guidances.name'),
                // TextColumn::make('pests.name'),
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
            'index' => Pages\ListVegetables::route('/'),
            'create' => Pages\CreateVegetable::route('/create'),
            'edit' => Pages\EditVegetable::route('/{record}/edit'),
        ];
    }
}
