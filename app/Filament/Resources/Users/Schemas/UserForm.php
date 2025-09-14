<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->schema([
            Section::make('Informations personnelles')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom complet')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->required(),

                    Forms\Components\TextInput::make('password')
                        ->label('Mot de passe')
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                        ->dehydrated(fn ($state) => filled($state)) // éviter d'écraser si vide
                        ->required(fn ($context) => $context === 'create')
                        ->revealable()
                        ->helperText('Laissez vide lors de l’édition si vous ne changez pas le mot de passe.'),
                ])
                ->columns(2),

            Section::make('Rôles & Permissions')
                ->schema([
                    Forms\Components\Select::make('roles')
                        ->label('Rôles')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->helperText('Sélectionne un ou plusieurs rôles pour cet utilisateur.'),
                ])
                ->collapsible(),
        ]);
    }
}
