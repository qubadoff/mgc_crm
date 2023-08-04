<?php

namespace App\Filament\Resources\DayoffResource\Pages;

use App\Filament\Resources\DayoffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDayoffs extends ListRecords
{
    protected static string $resource = DayoffResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
