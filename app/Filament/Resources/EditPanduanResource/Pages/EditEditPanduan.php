<?php

namespace App\Filament\Resources\EditPanduanResource\Pages;

use App\Filament\Resources\EditPanduanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEditPanduan extends EditRecord
{
    protected static string $resource = EditPanduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
