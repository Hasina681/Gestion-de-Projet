<?php

namespace App\Models;

use App\Models\Projet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tache extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=[
        'projet_id',
        'nom',
        'description',
        'etat',
        'deadline',
        'progression',
        'priorite',  
        'user_id',   
        'date_debut',
        'date_fin',
        'observation'
    ];

    public function projet():BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function suivitemps()
    {
        return $this->hasMany(SuiviTemps::class);
    }
}

