<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fighter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'photo',
        'record_win',
        'record_loss',
        'record_draw',
        'weight_class',
        'height_cm',
        'reach_cm',
        'bio',
    ];

    public function fights()
    {
        return Fight::query()
            ->where('red_fighter_id', $this->id)
            ->orWhere('blue_fighter_id', $this->id);
    }
}
