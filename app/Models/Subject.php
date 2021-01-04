<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'e_credit',
        'co_op',
    ];

    public function attachedCompetences()
    {
        return $this->belongsToMany(
            Competence::class,
            'competence_subject',
            'subject_id',
            'competence_id'
        )->withTimestamps()->orderBy('id');
    }

    public function competences()
    {
        return $this->hasMany(Competence::class, 'subject_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function semesters()
    {
        return $this->hasMany(Semester::class,'subject_id','id');
    }

    public function coursePlans()
    {
        return $this->hasMany(CoursePlan::class,'subject_id','id');
    }
}
