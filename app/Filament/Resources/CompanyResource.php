<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Company directory';

    protected static ?string $label = 'Company';

    protected static ?string $pluralLabel = 'Companies';

    protected static ?string $navigationLabel = 'Companies';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        Select::make('legal_form')
                            ->options([
                                'SA' => 'SA',
                                'SAS' => 'SAS',
                                'SNC' => 'SNC',
                                'SCS' => 'SCS',
                                'SCOP' => 'SCOP',
                                'SCM' => 'SCM',
                                'SELARL' => 'SELARL',
                                'SCI' => 'SCI',
                                'EURL' => 'EURL',
                                'SASU' => 'SASU',
                                'SEP' => 'SEP',
                                'SELAS' => 'SELAS',
                                'SELAFA' => 'SELAFA',
                                'SEM' => 'SEM',
                                'SCA' => 'SCA',
                                'SRL' => 'SRL',
                                'SARL' => 'SARL',
                                'SPRL' => 'SPRL',
                            ])
                            ->searchable()
                            ->required(),
                        Select::make('vat_country_code')
                            ->options([
                                'AT' => 'AT',
                                'BE' => 'BE',
                                'BG' => 'BG',
                                'CY' => 'CY',
                                'CZ' => 'CZ',
                                'DE' => 'DE',
                                'DK' => 'DK',
                                'EE' => 'EE',
                                'EL' => 'EL',
                                'ES' => 'ES',
                                'FI' => 'FI',
                                'FR' => 'FR',
                                'HR' => 'HR',
                                'HU' => 'HU',
                                'IE' => 'IE',
                                'IT' => 'IT',
                                'LT' => 'LT',
                                'LU' => 'LU',
                                'LV' => 'LV',
                                'MT' => 'MT',
                                'NL' => 'NL',
                                'PL' => 'PL',
                                'PT' => 'PT',
                                'RO' => 'RO',
                                'SE' => 'SE',
                                'SI' => 'SI',
                                'SK' => 'SK',
                                'XI' => 'XI',
                            ])
                            ->searchable()
                            ->required(),
                        TextInput::make('vat_number')
                            ->numeric()
                            ->required(),
                    ])->columns(2),
                Card::make()
                    ->schema([
                        TextInput::make('street')
                            ->required(),
                        TextInput::make('zipcode')
                            ->numeric()
                            ->required(),
                        TextInput::make('number')
                            ->numeric()
                            ->required(),
                        TextInput::make('city')
                            ->required(),
                        TextInput::make('box'),
                        Select::make('country')
                            ->options([
                                'Germany' => 'Germany',
                                'Austria' => 'Austria',
                                'Belgium' => 'Belgium',
                                'Bulgaria' => 'Bulgaria',
                                'Cyprus' => 'Cyprus',
                                'Croatia' => 'Croatia',
                                'Denmark' => 'Denmark',
                                'Spain' => 'Spain',
                                'Estonia' => 'Estonia',
                                'Finland' => 'Finland',
                                'France' => 'France',
                                'Greece' => 'Greece',
                                'Hungary' => 'Hungary',
                                'Ireland' => 'Ireland',
                                'Italy' => 'Italy',
                                'Latvia' => 'Latvia',
                                'Lithuania' => 'Lithuania',
                                'Luxembourg' => 'Luxembourg',
                                'Malta' => 'Malta',
                                'Netherlands' => 'Netherlands',
                                'Poland' => 'Poland',
                                'Portugal' => 'Portugal',
                                'Romania' => 'Romania',
                                'Slovakia' => 'Slovakia',
                                'Slovenia' => 'Slovenia',
                                'Sweden' => 'Sweden',
                                'Czech Republic' => 'Czech Republic'
                            ])
                            ->searchable()
                            ->required(),
                    ])->columns(2),
                Card::make()
                    ->schema([
                        Select::make('contacts')
                            ->searchable()
                            ->multiple()
                            ->relationship('contacts', 'first_name')
                            ->preload()
                            ->columnSpan(1),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->limit(20),
                TextColumn::make('vat_number')
                    ->searchable()
                    ->getStateUsing(function (Model $record): string {
                        return $record->vat_country_code . $record->vat_number;
                    }),
                BadgeColumn::make('legal_form')
                    ->extraAttributes(['class' => 'uppercase']),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return $record->name;
                    }),
                Tables\Actions\ForceDeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return $record->name;
                    }),
                Tables\Actions\RestoreAction::make()
                    ->modalHeading(function (Model $record): string {
                        return $record->name;
                    })
            ])
            ->bulkActions([])
            ->poll('10s');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
