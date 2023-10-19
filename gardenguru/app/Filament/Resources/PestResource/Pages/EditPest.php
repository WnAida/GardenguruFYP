<?php

namespace App\Filament\Resources\PestResource\Pages;

use App\Filament\Resources\PestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPest extends EditRecord
{
    protected static string $resource = PestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
