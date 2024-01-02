<?php

namespace App\Filament\Resources;

use App\Enums\EventActionEnum;
use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Helpers\EnumMap;
use App\Models\Event;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Enum\Laravel\Rules\EnumRule;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;

class EventResource extends Resource
{
    protected static ?string $navigationGroup = 'Schedule Tracking';
    protected static ?string $model = Event::class;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([ //

                Select::make ('action')
                ->options(EnumMap::getEventAction())
                ->rules([
                    new EnumRule(EventActionEnum::class)
                ])
                ->disablePlaceholderSelection()
                ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('schedule.name')
                ->label('User Name')
                ->limit(10),
                TextColumn::make('schedule.planted_at')
                ->label('Plant Planted Date'),
                // TextColumn::make('schedule.location')
                // ->label('Location'),
                TextColumn::make('schedule.stage_label')
                ->label('Plant Stage'),
                BadgeColumn::make('action_label')
                    ->colors([
                        'primary' => EventActionEnum::Water()->label,
                        'primary' => EventActionEnum::Repellent()->label,
                        'primary' => EventActionEnum::Trim()->label,
                        'primary' => EventActionEnum::Fertilize()->label,
                    ])
                    ->label('Action'),
                TextColumn::make('do_at'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
