<?php

namespace App\Filament\Resources\GuidanceResource\Pages;

use App\Filament\Resources\GuidanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuidances extends ListRecords
{
    protected static string $resource = GuidanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
