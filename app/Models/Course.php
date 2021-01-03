<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'study_year',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id','id');
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class,'campus_id','id');
    }

    public function plans()
    {
        return $this->hasMany(CoursePlan::class,'course_id','id');
    }
}
