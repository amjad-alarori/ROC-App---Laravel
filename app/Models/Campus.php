<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'street',
        'house_nr',
        'house_nr_addition',
        'zip_code',
        'city',
        'email',
        'phone_nr',
    ];

//    public function programArea()
//    {
//        return $this->hasMany(ProgramArea::class, 'campusId', 'id');
//    }

    public function courses()
    {
        return $this->hasMany(Course::class,'campus_id','id');
    }
}
