<?php

namespace Database\Factories;

use App\Helpers\RomanNumeralsHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RomanNumeralConversion>
 */
class RomanNumeralConversionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'method' => RomanNumeralsHelper::ROMAON_NUMERAL_CONVERSION_METHOD[array_rand(RomanNumeralsHelper::ROMAON_NUMERAL_CONVERSION_METHOD)],
            'roman_value' => 'xx',
            'value' => 20
        ];
    }
}
