<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game = new Game;
        $game->title = 'The Legend of Zelda: Breath of the Wild';
        $game->developer = 'Nintendo';
        $game->releasedate = '2017-03-03';
        $game->category_id = 1;
        $game->user_id = 1;
        $game->price = 59.99;
        $game->genre = 'Action-Adventure';
        $game->description = 'lorem impsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'Red Dead Redemption 2';
        $game->developer = 'Rockstar Games';
        $game->releasedate = '2018-10-26';
        $game->category_id = 2;
        $game->user_id = 1;
        $game->price = 59.99;
        $game->genre = 'Action-Adventure';
        $game->description = 'lorem impsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'The Witcher 3: Wild Hunt';
        $game->developer = 'CD Projekt';
        $game->releasedate = '2015-05-19';
        $game->category_id = 3;
        $game->user_id = 1;
        $game->price = 39.99;
        $game->genre = 'Action-RPG';
        $game->description = 'lorem impsum dolor sit amet';
        $game->save();

        $game = new Game;
        $game->title = 'Minecraft';
        $game->developer = 'Mojang Studios';
        $game->releasedate = '2011-11-18';
        $game->category_id = 4;
        $game->user_id = 1;
        $game->price = 26.95;
        $game->genre = 'Sandbox';
        $game->description = 'lorem impsum dolor sit amet';
        $game->save();
    }
}
