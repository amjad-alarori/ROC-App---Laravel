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

<<<<<<< HEAD
    public function competences()
=======
    public function attachedCompetences()
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    {
        return $this->belongsToMany(
            Competence::class,
            'competence_subject',
<<<<<<< HEAD
            'competence_id',
            'subject_id'
        )->withTimestamps();
=======
            'subject_id',
            'competence_id'
        )->withTimestamps()->orderBy('id');
    }

    public function competences()
    {
        return $this->hasMany(Competence::class,'subject_id','id')
            ->union(Competence::query()->where('subject_id','=',null))->get();
    }

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id','id');
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }
}
