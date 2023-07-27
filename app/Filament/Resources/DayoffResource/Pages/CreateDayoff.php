<?php

namespace App\Filament\Resources\DayoffResource\Pages;

use App\Filament\Resources\DayoffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDayoff extends CreateRecord
{
    protected static string $resource = DayoffResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
