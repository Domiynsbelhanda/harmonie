<?php

namespace App\Filament\Resources\StudentProfiles\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class StudentProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('matricule')->label('Matricule')->sortable()->searchable(),
                TextColumn::make('nom')->sortable()->searchable(),
                TextColumn::make('postnom')->sortable()->searchable(),
                TextColumn::make('prenom')->sortable()->searchable(),
                TextColumn::make('classe.name')->label('Classe')->sortable(),
                TextColumn::make('statut')->sortable(),
            ])
            ->recordActions([
                Action::make('generer_matricule')
                    ->label('Générer le matricule')
                    ->icon('heroicon-o-key')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => is_null($record->matricule))
                    ->action(function ($record) {
                        $today = now();
                        $year = $today->month < 7 || ($today->month == 7 && $today->day < 2) ? $today->year - 1 : $today->year;

                        $initials = strtoupper(
                            mb_substr($record->nom, 0, 1) .
                            mb_substr($record->postnom, 0, 1) .
                            mb_substr($record->prenom, 0, 1)
                        );

                        $email = strtolower($year.$initials.str_pad($record->id, 4, '0', STR_PAD_LEFT)) . '@harmoniedusavoir.org';

                        $user = User::create([
                            'name' => $record->nom.' '.$record->postnom.' '.$record->prenom,
                            'email' => $email,
                            'password' => Hash::make('12345678'),
                        ]);

                        $user->assignRole('Eleve');

                        $matricule = $year.'-'.$initials.'-'.str_pad($user->id, 4, '0', STR_PAD_LEFT);

                        $record->update([
                            'user_id' => $user->id,
                            'matricule' => $matricule,
                            'academic_year' => $year,
                        ]);
                    }),
                EditAction::make(),
                ViewAction::make(),
            ])
            ->filters([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
