<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\SaveAction::make(),
            Actions\CancelAction::make(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            // Define your form fields here
        ];
    }
}