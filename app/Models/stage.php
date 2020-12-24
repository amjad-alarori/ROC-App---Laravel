<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stage extends Model
{
    use HasFactory;

    public function stageBedrijven()
    {
        return $this->belongsTo(StageBedrijven::class,'stageBedrijf_id','id');
    }
}
