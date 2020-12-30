<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'birthDate',
        'address',
        'city',
        'zip_code',
        'email',
        'phone_nr',

        'education_mbo',
        'institute_mbo',
        'startDate_mbo',
        'endDate_mbo',

        'level',
        'institute_middle',
        'startDate_middle',
        'endDate_middle',

        'institute_basic',
        'startDate_basic',
        'endDate_basic',

        'company',
        'function',
        'startDate_work',
        'endDate_work',

        'hobbyOne',
        'hobbyTwo',
        'hobbyThree',
        'hobbyFour',

        'skillOne',
        'skillTwo',
        'skillThree',
        'skillFour',
    ];


}
