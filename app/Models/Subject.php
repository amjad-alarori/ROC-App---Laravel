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

    public function competences()
    {
        return $this->belongsToMany(
            Competence::class,
            'competence_subject',
            'competence_id',
            'subject_id'
        )->withTimestamps();
    }
}
