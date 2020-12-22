<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramArea extends Model
{
    use HasFactory;

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campusId', 'id');
    }

    public function program()
    {
        return $this->hasMany(Program::class, 'areaId', 'id');
    }
}
