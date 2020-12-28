<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
    ];

<<<<<<< HEAD
    public function subjects()
=======
    public function attachedSubjects()
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    {
        return $this->belongsToMany(
            Subject::class,
            'competence_subject',
<<<<<<< HEAD
            'subject_id',
            'competence_id'
        )->withTimestamps();
=======
            'competence_id',
            'subject_id'
        )->withTimestamps()->orderBy('id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }
}
