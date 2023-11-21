<?php

namespace App\Filament\Resources;

use App\Enums\ProductCategoryEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Helpers\EnumMap;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;
use Spatie\Enum\Laravel\Rules\EnumRule;

class ProductResource extends Resource
{
    protected static ?string $navigationGroup = 'Seller';
    public static function getPluralModelLabel(): string
    {
        return __('Seller Product');
    }

    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category')
                    ->options(EnumMap::getUserExpertise())
                    ->rules([
                        new EnumRule(ProductCategoryEnum::class)
                    ])
                    ->disablePlaceholderSelection()
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Seller'),
                TextColumn::make('name')
                    ->label('Product'),
                TextColumn::make('description')->limit(15),
                TextColumn::make('quantity'),
                BadgeColumn::make('category_label')
                    ->colors([
                        'primary' => ProductCategoryEnum::Seed()->label,
                        'primary' => ProductCategoryEnum::Fertilizer()->label,
                    ]),
                TextColumn::make('price')
                    ->money('myr', true),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
