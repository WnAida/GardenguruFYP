<?php

namespace App\Filament\Resources\PestResource\Pages;

use App\Filament\Resources\PestResource;
use App\Models\Pest;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPest extends EditRecord
{
    protected static string $resource = PestResource::class;

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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($data != null) {
            $pest = Pest::find($data['id']);

            //Vegetables
            $vegetable_array = [];
            foreach ($pest->vegetables ?? [] as $vegetable) {
                $vegetable_array[] = $vegetable->id;
            }
            $data['vegetable'] = $vegetable_array ?? null;
        }
        return $data;
    }

    protected function handleRecordUpdate($record, array $data): Pest
    {
        $pest = Pest::find($record['id']);
        //belongs to many relationship
        $pest->vegetables()->sync($data['vegetable']);
        $pest->update();

        return $record;
    }
}
