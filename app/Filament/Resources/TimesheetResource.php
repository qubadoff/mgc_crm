<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\TimesheetResource\Pages;
use App\Models\Timesheet;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;


class TimesheetResource extends Resource
{
    protected static ?string $model = Timesheet::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        if (\auth()->user()->hasRole('Admin'))
        {
            return $form
                ->schema([
                    Forms\Components\Select::make('employee_id')->label('Employee')->required()->relationship('user', 'name')->preload()->default(\auth()->user()->id),
                    Forms\Components\Select::make('customer_id')->label('Customer')->relationship('customer', 'name')->preload(),
                    Forms\Components\Select::make('participation_id')->label('Participation')->relationship('participation', 'name')->preload()->required(),
                    Forms\Components\TextInput::make('working_hours')->placeholder('Example: 2')
                        ->numeric()
                        ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask
                        ->numeric()
                        ->decimalSeparator('.'))
                        ->label('Working Hours'),
                    Forms\Components\DatePicker::make('working_day')->label('Working Day'),
                    Forms\Components\TextInput::make('work_desc')->label('Work Description'),
                    Forms\Components\Hidden::make('aded_by')->required()->default(auth()->id()),
                ]);
        } else {
//            return $form
//                ->schema([
//                    Forms\Components\Repeater::make('timesheet')
//                        ->schema([
//                    Forms\Components\Hidden::make('employee_id')->required()->default(auth()->id()),
//                    Forms\Components\Select::make('customer_id')->label('Customer')->relationship('customer', 'name')->preload()->required(),
//                    Forms\Components\Hidden::make('participation_id')->required()->default('1'),
//                    Forms\Components\TextInput::make('working_hours')->placeholder('Example: 2')->numeric()->label('Working Hours')->required(),
//                    Forms\Components\DatePicker::make('working_day')->label('Working Day')->required(),
//                    Forms\Components\TextInput::make('work_desc')->label('Work Description')->required(),
//                        ])
//                    ->columns(2)
//                ]);
            return $form
                ->schema([
                    Forms\Components\Hidden::make('employee_id')->required()->default(auth()->id()),
                    Forms\Components\Hidden::make('aded_by')->required()->default(auth()->id()),
                    Forms\Components\Select::make('customer_id')->label('Customer')->relationship('customer', 'name')->preload()->required(),
                    Forms\Components\Hidden::make('participation_id')->required()->default('1'),
                    Forms\Components\TextInput::make('working_hours')->placeholder('Example: 2')->numeric()->label('Working Hours')->required(),
                    Forms\Components\DatePicker::make('working_day')->label('Working Day')->required(),
                    Forms\Components\TextInput::make('work_desc')->label('Work Description')->required(),
                ]);
        }

    }


    public static function table(Table $table): Table
    {
        if (\auth()->user()->hasRole('Admin'))
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('id')->sortable(),
                    Tables\Columns\TextColumn::make('Employee.name')->label('Employee name')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('Customer.name')->label('Customer')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('Participation.name')->label('Participation')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('working_hours')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('working_day')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('work_desc')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('created_at')->searchable()->sortable(),
                ])
                ->filters([
                    Filter::make('working_day')
                        ->form([
                            Forms\Components\DatePicker::make('From'),
                            Forms\Components\DatePicker::make('Until'),
                        ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['From'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('working_day', '>=', $date),
                                )
                                ->when(
                                    $data['Until'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('working_day', '<=', $date),
                                );
                        })
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
                    FilamentExportBulkAction::make('export'),
                ]);
        }
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('Employee.name')->label('Staff name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('Customer.name')->label('Customer')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('Participation.name')->label('Participation')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('working_hours')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('working_day')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('work_desc')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->searchable()->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('working_hours')->label('Working Hours')->toggle(),
                Tables\Filters\Filter::make('working_day')->label('Working Day')->toggle(),
                Tables\Filters\Filter::make('work_desc')->label('Working Desc')->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTimesheets::route('/'),
            'create' => Pages\CreateTimesheet::route('/create'),
            'edit' => Pages\EditTimesheet::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (\auth()->user()->hasRole('Admin'))
        {
            return parent::getEloquentQuery();
        } else {
            return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
        }
    }
}
