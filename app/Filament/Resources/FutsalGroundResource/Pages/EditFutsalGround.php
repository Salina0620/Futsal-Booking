<?php

namespace App\Filament\Resources\FutsalGroundResource\Pages;

use App\Filament\Resources\FutsalGroundResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFutsalGround extends EditRecord
{
    protected static string $resource = FutsalGroundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
