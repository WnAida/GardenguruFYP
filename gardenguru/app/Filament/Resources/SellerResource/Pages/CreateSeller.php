<?php

namespace App\Filament\Resources\SellerResource\Pages;

use App\Filament\Resources\SellerResource;
use App\Models\Seller;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSeller extends CreateRecord
{
    protected static string $resource = SellerResource::class;

    protected function handleRecordCreation(array $data): Seller
    {
        $seller = new Seller();
        $seller->fill($data);
        $seller->save();

        return $seller;
    }
}
