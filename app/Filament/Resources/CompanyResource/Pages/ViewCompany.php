<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\HtmlString;

class ViewCompany extends ViewRecord
{
    protected static string $resource = CompanyResource::class;

    protected function getTitle(): string
    {
        return $this->record->name;
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    Placeholder::make('')
                        ->content(new HtmlString('<h2 class="text-xl font-bold">Infos</h2>')),
                    Card::make()
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('legal_form'),
                            TextInput::make('vat_country_code'),
                            TextInput::make('vat_number'),
                        ])->columns(2),
                    Card::make()
                        ->schema([
                            TextInput::make('street'),
                            TextInput::make('zipcode'),
                            TextInput::make('number'),
                            TextInput::make('city'),
                            TextInput::make('box'),
                            TextInput::make('country'),
                        ])->columns(2),
                ]),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            CompanyResource\Widgets\ContactTable::class,
        ];
    }

    protected function getFooterWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
