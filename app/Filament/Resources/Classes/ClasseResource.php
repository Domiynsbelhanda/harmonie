<?php

namespace App\Filament\Resources\Classes;

use App\Filament\Resources\Classes\Pages\CreateClasse;
use App\Filament\Resources\Classes\Pages\EditClasse;
use App\Filament\Resources\Classes\Pages\ListClasses;
use App\Filament\Resources\Classes\Pages\ViewClasse;
use App\Filament\Resources\Classes\Schemas\ClasseForm;
use App\Filament\Resources\Classes\Schemas\ClasseInfolist;
use App\Filament\Resources\Classes\Tables\ClassesTable;
use App\Models\Classe;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClasseResource extends Resource
{
    protected static ?string $model = Classe::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Classe';
    protected static string|null|\UnitEnum $navigationGroup = 'Elèves / Classes';

    public static function form(Schema $schema): Schema
    {
        return ClasseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClasseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClasses::route('/'),
            'create' => CreateClasse::route('/create'),
            'view' => ViewClasse::route('/{record}'),
            'edit' => EditClasse::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin']);
    }
}
