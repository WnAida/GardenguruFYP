<?php

namespace App\Filament\Resources\GuidanceResource\Pages;

use App\Filament\Resources\GuidanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuidance extends EditRecord
{
    protected static string $resource = GuidanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
