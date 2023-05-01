<?php

namespace App\Http\Controllers;

use App\Helpers\RomanNumeralsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function easy()
    {
        return view('easy');
    }

    public function easyConvert(Request $request)
    {
        //Validate request
        $validate = Validator::make($request->all(), [
            'romanNumeral' => [
                'required',
                'max:1',
                function($attribute, $value, $fail) {
                    if(!RomanNumeralsHelper::romanNumeralIsValidCharacters($value)) {
                        $fail('Roman Numeral Letter '.strtoupper($value).' is invalid.');
                    }
                },
            ],
        ],[
            'romanNumeral.required' => 'Roman Numeral Letter is required.',
            'romanNumeral.max' => 'Roman Numeral Letter maximum length is 1 character.',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }

        //Get value
        $result = RomanNumeralsHelper::convertEasy($request->input('romanNumeral'));

        return view('easy')->with(['result' => ['input' => strtoupper($request->input('romanNumeral')), 'value' => $result]]);
    }

    public function advanced()
    {
        return view('advanced');
    }

    public function advancedConvert(Request $request)
    {
        //Validate request
        $validate = Validator::make($request->all(), [
            'romanNumeral' => [
                'required',
                function($attribute, $value, $fail) {
                    if(!RomanNumeralsHelper::romanNumeralIsValidCharacters($value)) {
                        $fail('Roman Numeral String contains invalid characters.');
                    }
                },
                function($attribute, $value, $fail) {
                    if(!RomanNumeralsHelper::romanNumeralIsValidOrder($value)) {
                        $fail('Roman Numeral String '.strtoupper($value).' in invalid order.');
                    }
                }
            ],
        ],[
            'romanNumeral.required' => 'Roman Numeral String is required.',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }

        //Get value
        $result = RomanNumeralsHelper::convertAdvanced($request->input('romanNumeral'));

        return view('advanced')->with(['result' => ['input' => strtoupper($request->input('romanNumeral')), 'value' => $result]]);
    }
}
