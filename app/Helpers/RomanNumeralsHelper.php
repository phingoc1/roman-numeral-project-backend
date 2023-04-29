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
                //If next character value is lower than current, substract.
                if($currentLetterValue >= $nextLetterValue) $sumValues = $sumValues + $currentLetterValue;
                if($currentLetterValue < $nextLetterValue) $sumValues = $sumValues - $currentLetterValue;
            }

            //If last character, add
            if($i + 1 == $stringLength) $sumValues = $sumValues + $currentLetterValue;
        }

        return $sumValues;
    }
}
