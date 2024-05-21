<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
