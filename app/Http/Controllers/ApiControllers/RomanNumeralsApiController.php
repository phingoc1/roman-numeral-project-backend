<?php

namespace App\Http\Controllers\ApiControllers;

use App\Helpers\RomanNumeralsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RomanNumeralsApiController extends Controller
{
    public function easy(Request $request)
    {
        //Verify that request contains key "romanNumeralString"
        if(!$request->input('romanNumeralString')) {
            return $this->returnResponse('romanNumeralString is required', 400);
        }

        //Verify that "romanNumeralString" only contains one character
        if(strlen($request->input('romanNumeralString')) > 1) {
            return $this->returnResponse('romanNumeralString can only be one character', 400);
        }

        //Verify that romanNumeralString only contains legal characters
        if(!RomanNumeralsHelper::romanNumeralIsValidCharacters($request->input('romanNumeralString'))) {
            return $this->returnResponse('romanNumeralString contains illegal character', 400);
        }

        //Convert to int
        $result = RomanNumeralsHelper::convertEasy($request->input('romanNumeralString'));

        //Save to database
        $this->saveToDb($request->input('romanNumeralString'), $result, RomanNumeralsHelper::ROMAON_NUMERAL_CONVERSION_METHOD[1]);

        //return result
        return $this->returnResponse($result, 200);
    }

    public function advanced(Request $request)
    {
        //Verify that request contains key "romanNumeralString"
        if(!$request->input('romanNumeralString')) {
            return $this->returnResponse('romanNumeralString is required', 400);
        }

        //Verify that romanNumeralString only contains legal characters
        if(!RomanNumeralsHelper::romanNumeralIsValidCharacters($request->input('romanNumeralString'))) {
            return $this->returnResponse('romanNumeralString contains at least one illegal character', 400);
        }

        //Verify that romanNumeralString have characters in valid order
        if(!RomanNumeralsHelper::romanNumeralIsValidOrder($request->input('romanNumeralString'))) {
            return $this->returnResponse('romanNumeralString character invalid order', 400);
        }

        //Convert to int
        $result = RomanNumeralsHelper::convertAdvanced($request->input('romanNumeralString'));

        //Save to database
        $this->saveToDb($request->input('romanNumeralString'), $result, RomanNumeralsHelper::ROMAON_NUMERAL_CONVERSION_METHOD[1]);

        //return result
        return $this->returnResponse($result, 200);
    }

    private function returnResponse(string $message, string $statusCode): object
    {
        return response([
            'status' => $statusCode[0] == 4 ? 'error' : 'ok',
            'payload' => $message
        ], $statusCode)
            ->header('Content-Type', 'application/json');
    }

    private function saveToDb(string $value, int $result, string $method): void
    {
        RomanNumeralsHelper::saveToDb($value, $result, $method);
    }
}
