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
            $pest_array = [];
            foreach ($pest->vegetables ?? [] as $pest) {
                $pest_array[] = $pest->id;
            }
            $data['pest'] = $pest_array ?? null;
        }
        return $data;
    }
}
