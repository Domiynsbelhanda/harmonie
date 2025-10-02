<?php

namespace App\Filament\Resources\Classes\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClasseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                Textarea::make('description'),
                TextInput::make('room'),


                Select::make('teacher_id')
                    ->label('Titulaire de la classe')
                    ->options(
                        User::role('Enseignant')->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required(),
            ]);
    }
}
