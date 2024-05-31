<?php

namespace App\Models;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projet extends Model
{
    use HasFactory;

    protected $primaryKey='id';
    protected $fillable=[
        'direction_id',
        'nom',
        'description',
        'ReferenceProjet',
        'deadline',
        'etat',
        'observation',
    ];

    public function direction():BelongsTo
    {
            return $this->belongsTo(Direction::class);
    }

    public function taches():HasMany
    {
            return $this->hasMany(Tache::class);
    }
}
