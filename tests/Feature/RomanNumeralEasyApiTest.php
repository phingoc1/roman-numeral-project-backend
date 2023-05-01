<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RomanNumeralEasyApiTest extends TestCase
{
    public function test_easy_roman_numeral_conversion_missing_data()
    {
        $this->json('POST', 'api/roman-numerals-easy', [], ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    public function test_easy_roman_numeral_conversion_long_string()
    {
        $data = [
            'romanNumeralString' => 'xii',
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    public function test_easy_roman_numeral_conversion_invalid_characters()
    {
        $data = [
            'romanNumeralString' => 'w',
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    public function test_easy_roman_numeral_conversion_i()
    {
        $data = [
            'romanNumeralString' => 'i'
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 1,
            ]);
    }

    public function test_easy_roman_numeral_conversion_v()
    {
        $data = [
            'romanNumeralString' => 'v'
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 5,
            ]);
    }

    public function test_easy_roman_numeral_conversion_x()
    {
        $data = [
            'romanNumeralString' => 'x'
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 10,
            ]);
    }

    public function test_easy_roman_numeral_conversion_l()
    {
        $data = [
            'romanNumeralString' => 'l'
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 50,
            ]);
    }

    public function test_easy_roman_numeral_conversion_c()
    {
        $data = [
            'romanNumeralString' => 'c'
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 100,
            ]);
    }

    public function test_easy_roman_numeral_conversion_m()
    {
        $data = [
            'romanNumeralString' => 'm'
        ];

        $this->json('POST', 'api/roman-numerals-easy', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'payload' => 1000,
            ]);
    }
}
