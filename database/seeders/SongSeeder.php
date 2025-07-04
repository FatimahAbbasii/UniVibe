<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class SongSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('songs')->insert([
            [
                'music_slug' => 'study-night',
                'artist' => 'Dua Lipa',
                'title' => 'Dance The Night',
                'duration' => '2:58',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'music_slug' => 'study-night',
                'artist' => 'Sabrina Carpenter',
                'title' => 'Espresso',
                'duration' => '3:23',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'music_slug' => 'study-night',
                'artist' => 'Lady Gaga',
                'title' => 'Poker Face',
                'duration' => '3:46',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'music_slug' => 'study-night',
                'artist' => 'Shakira',
                'title' => 'Waka Waka',
                'duration' => '3:55',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'music_slug' => 'dance-party',
                'artist' => 'Beyoncé',
                'title' => 'Break My Soul',
                'duration' => '4:01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'music_slug' => 'dance-party',
                'artist' => 'Bruno Mars',
                'title' => 'Uptown Funk',
                'duration' => '3:59',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
