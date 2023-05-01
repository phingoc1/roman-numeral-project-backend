<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RomanNumeralConversion extends Model
{
    use HasFactory;

    protected $table = 'roman_numeral_conversions';
    protected $fillable = ['method', 'roman_value', 'value'];
}
