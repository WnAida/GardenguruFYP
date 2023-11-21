<?php

namespace App\Filament\Resources;

use App\Enums\UserExpertiseEnum;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Helpers\EnumMap;
use App\Models\User;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\BadgeColumn;
use Spatie\Enum\Laravel\Rules\EnumRule;

class UserResource extends Resource
{
    protected static ?string $navigationGroup = 'User';
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('email'),
                TextInput::make('password'),
                TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->rules(['max:255', 'string'])
                            ->required()
                            ->placeholder('ex: +6012-345-6789')
                            ->columnSpan([
                                'default' => 2,
                                'md' => 1,
                                'lg' => 1,
                            ]),
                TextInput::make('address'),
                Select::make ('expertise')
                ->options(EnumMap::getUserExpertise())
                ->rules([
                    new EnumRule(UserExpertiseEnum::class)
                ])
                ->disablePlaceholderSelection()
                ->reactive(),
                    FileUpload::make('attachment'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('phone_number'),
                TextColumn::make('address')
                ->limit(15),
                BadgeColumn::make('expertise_label')
                    ->colors([
                        'primary' => UserExpertiseEnum::Beginner()->label,
                        'primary' => UserExpertiseEnum::Intermediate()->label,
                        'primary' => UserExpertiseEnum::Expert()->label,
                    ]),
                TextColumn::make('profile_photo_path')
                ->limit(10),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
