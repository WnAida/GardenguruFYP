<?php

namespace App\Filament\Resources\VegetableResource\Pages;

use App\Filament\Resources\VegetableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVegetable extends EditRecord
{
    protected static string $resource = VegetableResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
