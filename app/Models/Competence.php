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

    public function attachedSubjects()
    {
        return $this->belongsToMany(
            Subject::class,
            'competence_subject',
            'subject_id',
            'competence_id'
        )->withTimestamps();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
