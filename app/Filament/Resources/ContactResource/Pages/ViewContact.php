<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\HtmlString;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getTitle(): string
    {
        return $this->record->first_name . ' ' . $this->record->last_name;
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    Placeholder::make('')
                        ->content(new HtmlString('<h2 class="text-xl font-bold">Infos</h2>'))
                        ->columnSpanFull(),
                    TextInput::make('last_name'),
                    TextInput::make('first_name'),
                    TextInput::make('job_title'),
                    TextInput::make('email'),
                    TextInput::make('phone'),
                ])->columns(2),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            ContactResource\Widgets\CompanyTable::class,
        ];
    }

    protected function getFooterWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
