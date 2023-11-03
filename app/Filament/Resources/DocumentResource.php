<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        if(\auth()->user()->hasRole('Admin'))
        {
            return $form
                ->schema([
                    Card::make([
                        TextInput::make("name")
                            ->label("Name")
                            ->required(),
                        Textarea::make("description")
                            ->label("Description"),
                        Select::make("user_id")
                            ->label("Choose user")
                            ->relationship('user', 'name')
                            ->required(),
                    ]),
                    Card::make([
                        FileUpload::make("file")
                            ->directory("Documents")
                            ->visibility("private")
                            ->minSize(10)
                            ->maxSize(20000)
                            ->minFiles(1)
                            ->maxFiles(30)
                            ->enableOpen()
                            ->enableDownload()
                            ->required()
                            ->multiple()
                    ])
                ]);
        } else {
            return $form
                ->schema([
                    Card::make([
                        TextInput::make("name")
                            ->label("Name")
                            ->required(),
                        Textarea::make("description")
                            ->label("Description"),
                        Hidden::make("user_id")
                            ->required()
                            ->default(auth()->id())
                    ]),
                    Card::make([
                        FileUpload::make("file")
                            ->directory("Documents")
                            ->visibility("private")
                            ->minSize(10)
                            ->maxSize(20000)
                            ->minFiles(1)
                            ->maxFiles(30)
                            ->enableOpen()
                            ->enableDownload()
                            ->required()
                            ->multiple()
                    ])
                ]);
        }
    }

    public static function table(Table $table): Table
    {
        if (auth()->user()->hasRole('Admin'))
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make("id")->label("ID"),
                    Tables\Columns\TextColumn::make("name")->label("Name")->sortable(),
                    Tables\Columns\TextColumn::make("User.name")->label("User")->sortable(),
                    Tables\Columns\TextColumn::make("created_at")->label("Created at")->sortable()->date('y/M/D'),
                    Tables\Columns\TextColumn::make("updated_at")->label("Updated at")->sortable()->date('y/M/D'),
                ])
                ->filters([
                    //
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
                    Tables\Columns\TextColumn::make("id")->label("ID"),
                    Tables\Columns\TextColumn::make("name")->label("Name")->sortable(),
                    Tables\Columns\TextColumn::make("created_at")->label("Created at")->sortable()->date('y/M/D'),
                    Tables\Columns\TextColumn::make("updated_at")->label("Updated at")->sortable()->date('y/M/D'),
                ])
                ->filters([
                    //
                ])
                ->actions([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
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
