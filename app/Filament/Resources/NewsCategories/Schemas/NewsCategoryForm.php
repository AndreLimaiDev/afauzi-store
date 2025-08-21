<?php

namespace App\Filament\Resources\NewsCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NewsCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->afterStateUpdatedJs(<<<'JS'
                        slugify = str => 
                            str
                                .toLowerCase()
                                .trim()
                                .replace(/\s+/g, '-')
                                .replace(/[^\w\-]+/g, '')
                                .replace(/\-\-+/g, '-');

                        $set('slug', slugify($state));
                    JS)
                    ->required(),
                TextInput::make('slug')
                    ->readOnly()
                    ->required(),
            ]);
    }
}
