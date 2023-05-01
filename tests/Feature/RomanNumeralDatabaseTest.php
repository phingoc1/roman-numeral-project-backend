<?php

namespace Tests\Feature;

use App\Models\RomanNumeralConversion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RomanNumeralDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_roman_numeral_conversion_save_to_database()
    {
        RomanNumeralConversion::factory()->count(3)->create();

        $this->assertDatabaseCount('roman_numeral_conversions', 3);
    }
}
