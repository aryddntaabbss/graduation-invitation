<?php

namespace App\Filament\Resources\PageSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('background')
                    ->disk('public')
                    ->directory('backgrounds')
                    ->image(),

                FileUpload::make('hero_image')
                    ->disk('public')
                    ->directory('hero_image')
                    ->image(),

                TextInput::make('header_text')
                    ->label('Header Text')
                    ->placeholder('We invited you to'),

                TextInput::make('name')
                    ->label('Nama'),

                TextInput::make('degree')
                    ->label('Gelar / Degree'),

                TextInput::make('class_info')
                    ->label('Informasi Kelas')
                    ->placeholder('CLASS OF 2025 - INFORMATICS UNKHAIR TERNATE'),

                TextInput::make('day')
                    ->label('Hari')
                    ->placeholder('Sabtu'),

                TextInput::make('date')
                    ->label('Tanggal')
                    ->placeholder('27'),

                TextInput::make('month')
                    ->label('Bulan')
                    ->placeholder('September'),

                TextInput::make('time')
                    ->label('Jam')
                    ->placeholder('12 PM'),

                Textarea::make('address')
                    ->label('Alamat')
                    ->rows(3),

                TextInput::make('maps_url')
                    ->label('Google Maps URL'),

                FileUpload::make('music_file')
                    ->disk('public')
                    ->directory('music'),
            ]);
    }
}
