<?php

namespace App\Filament\Resources\TimesheetResource\Pages;

use App\Filament\Resources\TimesheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\View\View;

class ListTimesheets extends ListRecords
{
    protected static string $resource = TimesheetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public array $data_list = [
        'calc_columns' => [
            'working_hours'
        ],
    ];

    protected function getTableContentFooter(): View
    {
        return view('table.footer', $this->data_list, $this->data_list_2);
    }
}
