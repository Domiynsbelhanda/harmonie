<?php

namespace App\Filament\Resources\Classes\Pages;

use App\Filament\Resources\Classes\ClasseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClasse extends EditRecord
{
    protected static string $resource = ClasseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
