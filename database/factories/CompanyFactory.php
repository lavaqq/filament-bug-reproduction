<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'legal_form' => fake()->randomElement([
                'SA',
                'SAS',
                'SNC',
                'SCS',
                'SCOP',
                'SCM',
                'SELARL',
                'SCI',
                'EURL',
                'SASU',
                'SEP',
                'SELAS',
                'SELAFA',
                'SEM',
                'SCA',
                'SRL',
                'SARL',
                'SPRL',
            ]),
            'vat_number' => fake()->randomNumber(8),
            'vat_country_code' => fake()->randomElement([
                'AT',
                'BE',
                'BG',
                'CY',
                'CZ',
                'DE',
                'DK',
                'EE',
                'EL',
                'ES',
                'FI',
                'FR',
                'HR',
                'HU',
                'IE',
                'IT',
                'LT',
                'LU',
                'LV',
                'MT',
                'NL',
                'PL',
                'PT',
                'RO',
                'SE',
                'SI',
                'SK',
                'XI',
            ]),
            'street' => fake()->streetName(),
            'number' => fake()->buildingNumber(),
            'box' => fake()->randomNumber(2),
            'city' => fake()->city(),
            'zipcode' => fake()->postcode(),
            'country' => fake()->country(),
        ];
    }
}
