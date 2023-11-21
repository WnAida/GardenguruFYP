<?php

namespace App\Filament\Resources\VegetableResource\Pages;

use App\Filament\Resources\VegetableResource;
use App\Models\Vegetable;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVegetable extends CreateRecord
{
    protected static string $resource = VegetableResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getURL('index');
    }

    protected function handleRecordCreation(array $data): Vegetable
    {
        $vegetable = new Vegetable();
        $vegetable->fill($data);
        $vegetable->save();

        return $vegetable;
    }
}
