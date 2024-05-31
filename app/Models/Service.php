<?php

namespace App\Models;

use App\Models\Direction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=[
        'nom',
        'description',
        'direction_id',
    ];


    public function direction():BelongsTo
    {
        return $this->BelongsTo(Direction::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}