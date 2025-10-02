<?php

namespace App\Filament\Resources\Classes\Pages;

use App\Filament\Resources\Classes\ClasseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClasse extends ViewRecord
{
    protected static string $resource = ClasseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
