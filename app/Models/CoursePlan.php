<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester',
        'period',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
