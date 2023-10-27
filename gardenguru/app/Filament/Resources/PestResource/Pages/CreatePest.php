<?php

namespace App\Filament\Resources\PestResource\Pages;

use App\Filament\Resources\PestResource;
use App\Models\Pest;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePest extends CreateRecord
{
    protected static string $resource = PestResource::class;

    protected function handleRecordCreation(array $data): Pest
    {
        $pest = new Pest();
        $pest->fill($data);
        $pest->save();

        //belongs to many relationship
        $pest->vegetables()->attach($data['vegetable']);
        $pest->update();

        return $pest;
    }

}
