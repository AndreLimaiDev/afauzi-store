<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                FileUpload::make('avatar')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('bio')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
