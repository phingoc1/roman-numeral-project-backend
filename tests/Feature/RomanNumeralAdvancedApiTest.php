<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RomanNumeralAdvancedApiTest extends TestCase
{
    public function test_advanced_roman_numeral_conversion_fail_if_missing_data()
    {
        $this->json('POST', 'api/roman-numerals-advanced', [], ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    public function test_advanced_roman_numeral_conversion_fail_if_contains_invalid_characters()
    {
        $data = [
            'romanNumeralString' => 'cccwxlvi',
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    public function test_advanced_roman_numeral_conversion_fail_if_characters_invalid_order()
    {
        $data = [
            'romanNumeralString' => 'iiix',
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                'status' => 'error'
            ]);
    }

    public function test_advanced_roman_numeral_conversion_iv()
    {
        $data = [
            'romanNumeralString' => 'iv'
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 4,
            ]);
    }

    public function test_advanced_roman_numeral_conversion_xii()
    {
        $data = [
            'romanNumeralString' => 'xii'
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 12,
            ]);
    }

    public function test_advanced_roman_numeral_conversion_xiv()
    {
        $data = [
            'romanNumeralString' => 'xiv'
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 14,
            ]);
    }

    public function test_advanced_roman_numeral_conversion_ivc()
    {
        $data = [
            'romanNumeralString' => 'ivc'
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    public function test_advanced_roman_numeral_conversion_cccxlvi()
    {
        $data = [
            'romanNumeralString' => 'cccxlvi'
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 346,
            ]);
    }

    public function test_advanced_roman_numeral_conversion_mix()
    {
        $data = [
            'romanNumeralString' => 'mix'
        ];

        $this->json('POST', 'api/roman-numerals-advanced', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 1009,
            ]);
    }


}
