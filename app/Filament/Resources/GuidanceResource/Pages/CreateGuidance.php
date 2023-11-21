<?php

namespace App\Filament\Resources\GuidanceResource\Pages;

use App\Filament\Resources\GuidanceResource;
use App\Models\Guidance;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGuidance extends CreateRecord
{
    protected static string $resource = GuidanceResource::class;

    protected function handleRecordCreation(array $data): Guidance
    {
        $guidance = new Guidance();
        $guidance->fill($data);
        $guidance->save();

        //belongs to many relationship
        $guidance->vegetables()->attach($data['vegetable']);
        $guidance->update();

        return  $guidance;
    }


}
