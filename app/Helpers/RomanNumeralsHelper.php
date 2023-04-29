<?php
namespace App\Helpers;

class RomanNumeralsHelper
{
    private const LEGAL_ROMAN_NUMERAL_CHARACTERS = 'IVXLCDM';
    private const ROMAN_NUMERALS = [
    'M' => 1000,
    'D' => 500,
    'C' => 100,
    'L' => 50,
    'X' => 10,
    'V' => 5,
    'I' => 1
    ];

    public static function romanNumeralIsValid(string $numeralString): bool
    {
    //Convert all characters to uppercase and check if string contains illegal characters
    if(!preg_match("/^[".self::LEGAL_ROMAN_NUMERAL_CHARACTERS."]+$/", strtoupper($numeralString))) {
        return false;
    }
    return true;

    //Alternative ternary
    //return !preg_match("/^[".self::LEGAL_ROMAN_NUMERAL_CHARACTERS."]+$/", $romanNumeralStringUC) ? false : true;
    }

    public static function convertEasy(string $numeralString): int
    {
        return self::ROMAN_NUMERALS[strtoupper($numeralString[0])];
    }

}
