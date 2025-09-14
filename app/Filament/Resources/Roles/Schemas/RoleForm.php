<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Arr;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->schema([
            Section::make('Informations')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom du rôle')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true)
                        ->helperText('Ex.: Super Admin, Admin, Enseignant, Comptable…'),

                    Forms\Components\Select::make('guard_name')
                        ->label('Guard')
                        ->required()
                        ->native(false)
                        ->default('web')
                        ->options(fn () => array_combine(
                            array_keys(config('auth.guards', ['web' => []])),
                            array_keys(config('auth.guards', ['web' => []]))
                        ))
                        ->helperText('Laisse "web" sauf besoin spécifique.'),
                ]),
        ]);
    }
}
