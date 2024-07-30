<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        // CHECK IF WE ARE NOT IN ID 1 or 2 or 3 (1,2,3 can't be deleted)
        if (!in_array($this->record->id, [1, 2, 3])) {
            return [ Actions\DeleteAction::make(), ];
        }

        else return [];
    }
}
