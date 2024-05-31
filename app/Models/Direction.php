<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Direction extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=[
        'nom',
        'description'
    ];

    public function services():HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function projets():HasMany
    {
        return $this->hasMany(Projet::class);
    }
}
