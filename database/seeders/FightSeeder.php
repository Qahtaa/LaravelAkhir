<?php

namespace Database\Seeders;

use App\Models\Fight;
use App\Models\Fighter;
use Illuminate\Database\Seeder;

class FightSeeder extends Seeder
{
    public function run(): void
    {
        $fighters = Fighter::pluck('id', 'name');
        $fights = [
            ['red' => 'Hapis Rahman', 'blue' => 'Rayyan Tappe', 'weight_class' => 'Lightweight', 'match_time' => now()->addDays(14)->setTime(19, 0), 'status' => 'Upcoming'],
            ['red' => 'Ardi Pratama', 'blue' => 'Dimas Satria', 'weight_class' => 'Featherweight', 'match_time' => now()->addHour(), 'status' => 'Live'],
            ['red' => 'Fajar Nugroho', 'blue' => 'Raka Wijaya', 'weight_class' => 'Catchweight', 'match_time' => now()->subDays(2)->setTime(20, 0), 'status' => 'Finished'],
            ['red' => 'Hapis Rahman', 'blue' => 'Ardi Pratama', 'weight_class' => 'Openweight', 'match_time' => now()->addDays(30)->setTime(20, 0), 'status' => 'Upcoming'],
        ];

        foreach ($fights as $fight) {
            Fight::updateOrCreate(
                ['red_fighter_id' => $fighters[$fight['red']], 'blue_fighter_id' => $fighters[$fight['blue']]],
                ['weight_class' => $fight['weight_class'], 'match_time' => $fight['match_time'], 'status' => $fight['status']]
            );
        }
    }
}
