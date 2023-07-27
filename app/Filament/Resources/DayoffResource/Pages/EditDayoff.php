<?php

namespace App\Filament\Resources\DayoffResource\Pages;

use App\Filament\Resources\DayoffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDayoff extends EditRecord
{
    protected static string $resource = DayoffResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
