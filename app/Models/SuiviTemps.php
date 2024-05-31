<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiviTemps extends Model
{
    use HasFactory;
    protected $fillable = [
        'tache_id', 
        'description',
        'hours',
    ];

    public function tache()
    {
        return $this->belongsTo(Tache::class);
    }
}
