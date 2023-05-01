<?php
namespace App\Helpers;

use App\Models\RomanNumeralConversion;

class RomanNumeralsHelper
{
    public const ROMAON_NUMERAL_CONVERSION_METHOD = [
        1 => 'api',
        2 => 'laravel-frontend',
    ];
    private const LEGAL_ROMAN_NUMERAL_CHARACTERS_REGEX = 'IVXLCDM';
    private const LEGAL_ROMAN_NUMERAL_CHARACTER_ORDER_REGEX = 'M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})';
    private const ROMAN_NUMERALS = [
    'M' => 1000,
    'D' => 500,
    'C' => 100,
    'L' => 50,
    'X' => 10,
    'V' => 5,
    'I' => 1
    ];

    public static function romanNumeralIsValidCharacters(string $numeralString): bool
    {
    //Convert all characters to uppercase and check if string contains illegal characters
    if(!preg_match("/^[".self::LEGAL_ROMAN_NUMERAL_CHARACTERS_REGEX."]+$/", strtoupper($numeralString))) {
        return false;
    }
    return true;
    }

    public static function romanNumeralIsValidOrder(string $numeralString): bool
    {
        //Convert all characters to uppercase and check if characters are in correct order
        if(!preg_match('/^'.self::LEGAL_ROMAN_NUMERAL_CHARACTER_ORDER_REGEX.'$/', strtoupper($numeralString))) {
            return false;
        }
        return true;
    }

    public static function convertEasy(string $numeralString): int
    {
        return self::ROMAN_NUMERALS[strtoupper($numeralString[0])];
    }

    public static function convertAdvanced(string $numeralString): int
    {
        //Get length of string before loop, so we don't have to check length at each iteration
        $stringLength = strlen($numeralString);

        //Convert string to uppercase, so it will be easier to work with
        $numeralString = strtoupper($numeralString);

        //Var for storing sum
        $sumValues = 0;

        //Loop over characters
        for($i = 0; $i < $stringLength; $i++) {

            //Get value of current character
            $currentLetterValue = self::ROMAN_NUMERALS[$numeralString[$i]];

            //Checking if this character is NOT the last character
            if($i + 1 < $stringLength) {

                //Check next character value
                $nextLetterValue = self::ROMAN_NUMERALS[$numeralString[$i+1]];

                //If current character value is greater or equal to next character value, add.
                //If next character value is lower than current, subtract.
                if($currentLetterValue >= $nextLetterValue) $sumValues += $currentLetterValue;
                if($currentLetterValue < $nextLetterValue) $sumValues -= $currentLetterValue;
            }

            //If last character, add
            if($i + 1 == $stringLength) $sumValues += $currentLetterValue;
        }

        return $sumValues;
    }

    public static function saveToDb(string $value, int $result, string $method): void
    {
        $save = new RomanNumeralConversion();
        $save->method = $method;
        $save->roman_value = $value;
        $save->value = $result;
        $save->save();
    }
}
