<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'functie',
        'leerweg',
        'aantal_plaatsen',
        'start_datum',
        'eind_datum',
        'wat_te_doen',
        'werkzaamheden',
        'wat_zoeken_wij',
        'stageBedrijf_id',
    ];




    public function stageBedrijven()
    {
        return $this->belongsTo(StageBedrijven::class,'stageBedrijf_id','id');
    }

    public function user(){

        return $this->belongsToMany(User::class);

    }
}
