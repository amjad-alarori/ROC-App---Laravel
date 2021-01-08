<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'grade',
        'definitive',
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function coursePlan()
    {
        return $this->belongsTo(CoursePlan::class,'course_plan_id','id');
    }
}
