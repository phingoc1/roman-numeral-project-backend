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

        //Verify that romanNumeralString only contains legal characters
        if(!RomanNumeralsHelper::romanNumeralIsValid($request->input('romanNumeralString'))) {
            return $this->returnResponse('romanNumeralString contains at least one illegal character', 400);
        }

        //Convert to int
        $result = RomanNumeralsHelper::convertEasy($request->input('romanNumeralString'));

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
}
