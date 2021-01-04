<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramArea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',
        'code'
    ];

    public function programs()
    {
        return $this->hasMany(Program::class,'area_id','id');
    }

    public function campus()
    {
        return$this->belongsTo(Campus::class, 'campusId', 'id');
    }
}
