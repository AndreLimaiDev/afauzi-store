<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->native(false)
                    ->required()
                    ->createOptionForm([
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
                    ]),
                Select::make('news_category_id')
                    ->relationship('newsCategory', 'title')
                    ->native(false)
                    ->required(),
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
                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->maxSize(1024)
                    ->columnSpanFull()
                    ->required(),
                MarkdownEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Section::make()
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Featured')
                    ])
                    ->columnSpanFull()
            ]);
    }
}
