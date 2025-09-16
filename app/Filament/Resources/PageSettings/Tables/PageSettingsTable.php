<?php

namespace App\Filament\Resources\PageSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class PageSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama'),
                Tables\Columns\TextColumn::make('date')->label('Tanggal'),
                Tables\Columns\TextColumn::make('month')->label('Bulan'),
                Tables\Columns\TextColumn::make('time')->label('Jam'),
            ])
            ->filters([
                // tambahin filter kalau perlu
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
