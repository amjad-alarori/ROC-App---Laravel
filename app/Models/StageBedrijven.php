<?php

namespace App\Models;

use Couchbase\UserSettings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StageBedrijven extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'zip_code',
        'city',
        'email',
        'phone_nr',
        'wie_zijn_wij',

    ];

    /**
     * @var mixed
     */

    public function stages()
    {
        return $this->hasMany(stage::class, 'stageBedrijf_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stagePlans()
    {
        return $this->hasMany(Grade::class,'company_id','id');
    }

}
