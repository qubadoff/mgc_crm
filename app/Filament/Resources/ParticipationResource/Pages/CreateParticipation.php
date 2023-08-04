<?php

namespace App\Filament\Resources\ParticipationResource\Pages;

use App\Filament\Resources\ParticipationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateParticipation extends CreateRecord
{
    protected static string $resource = ParticipationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
