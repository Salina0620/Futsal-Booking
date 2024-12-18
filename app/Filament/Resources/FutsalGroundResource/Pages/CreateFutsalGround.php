<?php

namespace App\Filament\Resources\FutsalGroundResource\Pages;

use App\Filament\Resources\FutsalGroundResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFutsalGround extends CreateRecord
{
    protected static string $resource = FutsalGroundResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect to the list page after creating the record
        return $this->getResource()::getUrl('index');
    }
}
