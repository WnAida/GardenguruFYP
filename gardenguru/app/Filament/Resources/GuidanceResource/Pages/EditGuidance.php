<?php

namespace App\Filament\Resources\GuidanceResource\Pages;

use App\Filament\Resources\GuidanceResource;
use App\Models\Guidance;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuidance extends EditRecord
{
    protected static string $resource = GuidanceResource::class;

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
            $guidance = Guidance::find($data['id']);

            //Vegetables
            $vegetable_array = [];
            foreach ($guidance->vegetables ?? [] as $vegetable) {
                $vegetable_array[] = $vegetable->id;
            }
            $data['vegetable'] = $vegetable_array ?? null;
        }
        return $data;
    }
}
