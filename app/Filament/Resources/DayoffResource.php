<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DayoffResource\Pages;
use App\Filament\Resources\DayoffResource\RelationManagers;
use App\Models\Dayoff;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class DayoffResource extends Resource
{
    protected static ?string $model = Dayoff::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        if (auth()->user()->hasRole('Admin'))
        {
            return $form
                ->schema([
                    Select::make('employee_id')->label('Employee')->required()->relationship('user', 'name')->preload()->default(auth()->user()->id),
                    TextInput::make('description')->label('Description')->placeholder('Ex: I want day off !')->required(),
                    DatePicker::make('start_date')->label('Start Date')->required(),
                    DatePicker::make('end_date')->label('End Date')->required(),
                    Select::make('status')->label('Status')->options([
                        'pending' => 'Pending',
                        'rejected' => 'Reject',
                        'accepted' => 'Accept',
                    ]),
                    Select::make('dayoff_type')->label('Dayoff Type')->options([
                        'dayoff' => 'Day off',
                        'sickleave' => 'Sickleave'
                    ]),
                    TextInput::make('total_of_days')
                        ->disabled()
                        ->formatStateUsing(fn(\Closure $get) => Carbon::parse($get('start_date'))->diffInDays(Carbon::parse($get('end_date'))))
                        ->dehydrateStateUsing(fn(\Closure $get) => Carbon::parse($get('start_date'))->diffInDays(Carbon::parse($get('end_date'))))
                        ->dehydrated(true)
                        ->required(),
                ]);
        } else {
            return $form
                ->schema([
                    Hidden::make('employee_id')->required()->default(auth()->id()),
                    TextInput::make('description')->label('Description')->placeholder('Ex: I want day off !')->required(),
                    Select::make('dayoff_type')->label('Dayoff Type')->options([
                        'dayoff' => 'Day off',
                        'sickleave' => 'Sickleave'
                    ]),
                    DatePicker::make('start_date')->label('Start Date')->required(),
                    DatePicker::make('end_date')->label('End Date')->required(),
                    Hidden::make('total_of_days')
                        ->disabled()
                        ->formatStateUsing(fn(\Closure $get) => Carbon::parse($get('start_date'))->diffInDays(Carbon::parse($get('end_date'))))
                        ->dehydrateStateUsing(fn(\Closure $get) => Carbon::parse($get('start_date'))->diffInDays(Carbon::parse($get('end_date'))))
                        ->dehydrated(true)
                        ->required(),
                ]);
        }
    }

    public static function table(Table $table): Table
    {
        if (auth()->user()->hasRole('Admin'))
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('id')->sortable(),
                    Tables\Columns\TextColumn::make('Employee.name')->label('Employee Name')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('description')->label('Description')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('start_date')->label('Start Date')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('end_date')->label('End Date')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('created_at')->label('Created at')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('status')->label('Status')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('dayoff_type')->label('Dayoff type')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('total_of_days')->label('Total Days')->searchable()->sortable(),
                ])
                ->filters([
                    Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'active' => 'Active',
                        'rejected' => 'Rejected'
                    ]),
                ])
                ->actions([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
                ]);
        } else {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('id')->sortable(),
                    Tables\Columns\TextColumn::make('Employee.name')->label('Employee Name')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('description')->label('Description')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('start_date')->label('Start Date')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('end_date')->label('End Date')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('created_at')->label('Created at')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('status')->label('Status')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('dayoff_type')->label('Dayoff type')->searchable()->sortable(),
                    Tables\Columns\TextColumn::make('total_of_days')->label('Total Days')->searchable()->sortable(),
                ])
                ->filters([
                    //
                ])
                ->actions([
                    //Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]);
        }
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
            'index' => Pages\ListDayoffs::route('/'),
            'create' => Pages\CreateDayoff::route('/create'),
            'edit' => Pages\EditDayoff::route('/{record}/edit'),
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
