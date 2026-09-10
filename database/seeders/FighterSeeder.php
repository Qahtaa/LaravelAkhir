<?php

namespace Database\Seeders;

use App\Models\Fighter;
use Illuminate\Database\Seeder;

class FighterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fighters = [
            [
                'name' => 'Hapis Rahman',
                'nickname' => 'The Storm',
                'record_win' => 8,
                'record_loss' => 1,
                'record_draw' => 0,
                'weight_class' => 'Lightweight',
                'height_cm' => 174,
                'reach_cm' => 178,
                'bio' => 'Striker eksplosif dengan tekanan tinggi sejak ronde pertama.',
            ],
            [
                'name' => 'Rayyan Tappe',
                'nickname' => 'Iron Pulse',
                'record_win' => 7,
                'record_loss' => 2,
                'record_draw' => 1,
                'weight_class' => 'Lightweight',
                'height_cm' => 176,
                'reach_cm' => 180,
                'bio' => 'Petarung teknikal yang nyaman bertukar pukulan di jarak menengah.',
            ],
            [
                'name' => 'Ardi Pratama',
                'nickname' => 'Southpaw Ace',
                'record_win' => 6,
                'record_loss' => 0,
                'record_draw' => 0,
                'weight_class' => 'Featherweight',
                'height_cm' => 170,
                'reach_cm' => 174,
                'bio' => 'Southpaw cepat dengan counter tajam dan footwork rapi.',
            ],
            [
                'name' => 'Dimas Satria',
                'nickname' => 'The Anchor',
                'record_win' => 5,
                'record_loss' => 3,
                'record_draw' => 0,
                'weight_class' => 'Welterweight',
                'height_cm' => 181,
                'reach_cm' => 185,
                'bio' => 'Grappler kuat yang gemar mengunci lawan di clinch.',
            ],
            [
                'name' => 'Fajar Nugroho',
                'nickname' => 'Blitz',
                'record_win' => 9,
                'record_loss' => 2,
                'record_draw' => 0,
                'weight_class' => 'Bantamweight',
                'height_cm' => 168,
                'reach_cm' => 171,
                'bio' => 'Petarung agresif dengan kombinasi pukulan cepat.',
            ],
            [
                'name' => 'Raka Wijaya',
                'nickname' => 'The Hammer',
                'record_win' => 10,
                'record_loss' => 4,
                'record_draw' => 1,
                'weight_class' => 'Middleweight',
                'height_cm' => 184,
                'reach_cm' => 188,
                'bio' => 'Power puncher berpengalaman dengan pukulan kanan berbahaya.',
            ],
        ];

        foreach ($fighters as $fighter) {
            Fighter::updateOrCreate(
                ['name' => $fighter['name']],
                $fighter
            );
        }
    }
}
