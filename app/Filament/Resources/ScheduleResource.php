<?php

namespace App\Filament\Resources;

use App\Enums\EventActionEnum;
use App\Enums\ScheduleStageEnum;
use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Helpers\EnumMap;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Spatie\Enum\Laravel\Rules\EnumRule;

class ScheduleResource extends Resource
{
    protected static ?string $navigationGroup = 'Schedule Tracking';
    protected static ?string $model = Schedule::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('location'),
                TextArea::make('notes'),
                DatePicker::make('planted_at'),
                TextInput::make('Seed'),
                Select::make ('Action')
                ->options(EnumMap::getScheduleStage())
                ->rules([
                    new EnumRule(ScheduleStageEnum::class)
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
                ->label('User'),
                TextColumn::make('name')
                ->label('Plant Name'),
                TextColumn::make('location'),
                TextColumn::make('notes')->limit(1),
                TextColumn::make('planted_at'),
                BadgeColumn::make('stage_label')
                    ->colors([
                        'primary' => ScheduleStageEnum::Seedling()->label,
                        'primary' => ScheduleStageEnum::Planted()->label,
                        'primary' => ScheduleStageEnum::Sprout()->label,
                        'primary' => ScheduleStageEnum::Flowering()->label,
                        'primary' => ScheduleStageEnum::Ripening()->label,
                        'primary' => ScheduleStageEnum::Harvested()->label,
                    ])
                    ->label('Plant Stage'),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
