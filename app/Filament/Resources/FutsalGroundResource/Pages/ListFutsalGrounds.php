<?php

namespace App\Filament\Resources\FutsalGroundResource\Pages;

use App\Filament\Resources\FutsalGroundResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFutsalGrounds extends ListRecords
{
    protected static string $resource = FutsalGroundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
