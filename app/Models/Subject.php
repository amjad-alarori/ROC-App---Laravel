<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable=[
      'title',
      'e_credit',
    ];

    public function attachedCompetences()
    {
        return $this->belongsToMany(
            Competence::class,
            'competence_subject',
            'competence_id',
            'subject_id'
        )->withTimestamps();
    }

    public function competences()
    {
        return $this->hasMany(Competence::class,'subject_id','id')
            ->union(Competence::query()->where('subject_id','=',null))->get();
    }

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id','id');
    }
}
