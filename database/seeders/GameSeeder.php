<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $nostalgics = [
            [
            'title' => 'Cadillac and Dinosaurs',
            'emulator' => 'MAME 2003-Plus',
            'genre' => 'Beat \'em up',
            'release_year' => 1993,
            'description' => 'A very popular nostalgic arcade game that every 90\'s kid loves',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'title' => 'Saturday Night Slam Masters',
            'emulator' => 'MAME 2003-Plus',
            'genre' => 'Wrestling',
            'release_year' => 1993,
            'description' => 'A very popular nostalgic 90\'s arcade wrestling game',
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ];

        foreach ($nostalgics as $nostalgic) {
            Game::create($nostalgic);
        }
    }
}
