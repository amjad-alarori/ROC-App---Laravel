<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'title',
        'degree',
        'length',
    ];

    public function area()
    {
        return $this->belongsTo(ProgramArea::class, 'area_id', 'id');
    }
}
