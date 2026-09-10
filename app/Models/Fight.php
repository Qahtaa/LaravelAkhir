<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    use HasFactory;

    protected $fillable = [
        'red_fighter_id',
        'blue_fighter_id',
        'weight_class',
        'match_time',
        'status',
    ];

    protected function casts(): array
    {
        return ['match_time' => 'datetime'];
    }

    public function redFighter()
    {
        return $this->belongsTo(Fighter::class, 'red_fighter_id');
    }

    public function blueFighter()
    {
        return $this->belongsTo(Fighter::class, 'blue_fighter_id');
    }
}
