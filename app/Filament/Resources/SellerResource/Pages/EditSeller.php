<?php

namespace App\Filament\Resources\SellerResource\Pages;

use App\Filament\Resources\SellerResource;
use App\Models\Seller;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeller extends EditRecord
{
    protected static string $resource = SellerResource::class;

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
        return $data;
    }

    protected function handleRecordUpdate($record, array $data): Seller
    {
        $seller = Seller::find($record['id']);
        $seller->update($data);

        return $record;
    }
}
