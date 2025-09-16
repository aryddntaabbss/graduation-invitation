<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title'),
                FileUpload::make('favicon')
                    ->disk('public')
                    ->directory('favicon')
                    ->image(),
                TextInput::make('og_title'),
                TextInput::make('twitter_title'),
                TextInput::make('og_description'),
                TextInput::make('twitter_description'),
                FileUpload::make('og_image')
                    ->disk('public')
                    ->directory('og_image')
                    ->image(),
                FileUpload::make('twitter_image')
                    ->disk('public')
                    ->directory('twitter_image')
                    ->image(),
            ]);
    }
}
