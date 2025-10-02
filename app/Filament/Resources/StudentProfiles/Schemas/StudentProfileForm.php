<?php

namespace App\Filament\Resources\StudentProfiles\Schemas;

use App\Models\Classe;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informations personnelles')
                    ->schema([
                        TextInput::make('nom')->required(),
                        TextInput::make('postnom')->required(),
                        TextInput::make('prenom')->required(),
                        Select::make('sexe')
                            ->options(['M' => 'Masculin', 'F' => 'Féminin'])
                            ->required(),
                        DatePicker::make('date_naissance')->required(),
                        TextInput::make('lieu_naissance'),
                        TextInput::make('nationalite'),
                    ])
                    ->columns(2),

                Section::make('Académique')
                    ->schema([
                        Select::make('classe_id')
                            ->label('Classe')
                            ->options(Classe::all()->pluck('name', 'id'))
                            ->searchable(),
                        Select::make('statut')
                            ->options([
                                'inscrit' => 'Inscrit',
                                'en_attente' => 'En attente',
                                'exclu' => 'Exclu',
                            ])
                            ->default('inscrit'),
                    ])
                    ->columns(2),

                Section::make('Contact')
                    ->schema([
                        TextInput::make('adresse'),
                        TextInput::make('telephone'),
                        TextInput::make('email'),
                    ])
                    ->columns(2),


                Section::make('Parents / Tuteur')
                    ->schema([
                        TextInput::make('nom_pere'),
                        TextInput::make('tel_pere'),
                        TextInput::make('nom_mere'),
                        TextInput::make('tel_mere'),
                        TextInput::make('tuteur'),
                    ])
                    ->columns(2),


                Section::make('Autres')
                    ->schema([
                        FileUpload::make('photo'),
                        Textarea::make('observations'),
                    ]),
            ]);
    }
}
