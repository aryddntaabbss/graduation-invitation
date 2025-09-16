<?php

namespace App\Filament\Resources\Guests\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class GuestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')->required(),
            TextInput::make('slug')
                ->disabled()
                ->dehydrated(false),
            TextInput::make('message')->required(),

        ]);
    }
}
