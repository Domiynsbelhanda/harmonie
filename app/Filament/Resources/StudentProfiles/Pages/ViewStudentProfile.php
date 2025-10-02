<?php

namespace App\Filament\Resources\StudentProfiles\Pages;

use App\Filament\Resources\StudentProfiles\StudentProfileResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Hash;

class ViewStudentProfile extends ViewRecord
{
    protected static string $resource = StudentProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),

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
        ];
    }
}
