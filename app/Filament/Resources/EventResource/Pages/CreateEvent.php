<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function handleRecordCreation(array $data): Event
    {
        $event = new Event();
        $event->fill($data);
        $event->save();

        return  $event;
    }
}
