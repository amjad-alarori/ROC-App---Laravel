<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramArea extends Model
{
    use HasFactory;

    public function programs()
    {
        return $this->hasMany(Program::class,'area_id','id');
    }
}
