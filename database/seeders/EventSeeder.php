<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'name' => 'Painting Jam',
                'description' => 'A chill night of freestyle painting with snacks and music.',
                'category' => 'Creative',
                'image' => 'painting.jpg',
                'organizer' => 'Arts Club',
                'vibe_score' => 78,
                'address' => 'Building B - Art Room 2',
                'time' => now()->addDays(2)->setTime(18, 30),
            ],
            [
                'name' => 'Hack by the Sea',
                'description' => '24h Hackathon by the Dutch coast. Food, swag, prizes!',
                'category' => 'Contest',
                'image' => 'hackathon.jpg',
                'organizer' => 'ICT Society',
                'vibe_score' => 92,
                'address' => 'Beach Pavilion Z',
                'time' => now()->addDays(5)->setTime(10, 0),
            ],
            [
                'name' => 'Campus Football Tournament',
                'description' => '8 teams, 1 trophy. Join or cheer!',
                'category' => 'Sports',
                'image' => 'football.jpg',
                'organizer' => 'Sports Committee',
                'vibe_score' => 84,
                'address' => 'UniVibe Stadium',
                'time' => now()->addDays(3)->setTime(14, 0),
            ],
            [
                'name' => 'Silent Disco Night',
                'description' => 'Wireless headphones, 3 DJs, 1 vibe.',
                'category' => 'Parties',
                'image' => 'silentdisco.jpg',
                'organizer' => 'PartyHub',
                'vibe_score' => 88,
                'address' => 'Student Lounge',
                'time' => now()->addDays(1)->setTime(21, 0),
            ],
            [
                'name' => 'Photography Walk',
                'description' => 'Capture the city with fellow students.',
                'category' => 'Creative',
                'image' => 'photowalk.jpg',
                'organizer' => 'Media Club',
                'vibe_score' => 73,
                'address' => 'City Centre',
                'time' => now()->addDays(4)->setTime(16, 0),
            ],
            [
                'name' => 'Basketball Challenge',
                'description' => '3v3 street-style tournament.',
                'category' => 'Sports',
                'image' => 'basketball.jpg',
                'organizer' => 'Athletics',
                'vibe_score' => 80,
                'address' => 'Outdoor Courts',
                'time' => now()->addDays(3)->setTime(11, 0),
            ],
            [
                'name' => 'Open Mic Night',
                'description' => 'Poetry, comedy, music – the stage is yours.',
                'category' => 'Creative',
                'image' => 'openmic.jpg',
                'organizer' => 'Literature Club',
                'vibe_score' => 76,
                'address' => 'Café Campus',
                'time' => now()->addDays(2)->setTime(20, 0),
            ],
            [
                'name' => 'Glow Party',
                'description' => 'Fluorescent dress code and blacklights!',
                'category' => 'Parties',
                'image' => 'glowparty.jpg',
                'organizer' => 'PartyHub',
                'vibe_score' => 91,
                'address' => 'Event Hall',
                'time' => now()->addDays(7)->setTime(22, 0),
            ],
            [
                'name' => 'Startup Pitch Battle',
                'description' => 'Compete with your startup idea.',
                'category' => 'Contest',
                'image' => 'pitch.jpg',
                'organizer' => 'Entrepreneurs Society',
                'vibe_score' => 85,
                'address' => 'Auditorium 1',
                'time' => now()->addDays(6)->setTime(13, 0),
            ],
            [
                'name' => 'Yoga & Chill',
                'description' => 'Morning yoga with relaxing music.',
                'category' => 'Sports',
                'image' => 'yoga.jpg',
                'organizer' => 'Wellness Group',
                'vibe_score' => 67,
                'address' => 'Campus Garden',
                'time' => now()->addDays(1)->setTime(8, 30),
            ],
            [
                'name' => 'Anime Drawing Workshop',
                'description' => 'Learn manga-style drawing in a fun workshop.',
                'category' => 'Creative',
                'image' => 'anime.jpg',
                'organizer' => 'Manga Club',
                'vibe_score' => 74,
                'address' => 'Room A203',
                'time' => now()->addDays(2)->setTime(15, 0),
            ],
            [
                'name' => 'Chess Blitz Tournament',
                'description' => 'Fast-paced 5-min games!',
                'category' => 'Contest',
                'image' => 'chess.jpg',
                'organizer' => 'Chess Club',
                'vibe_score' => 70,
                'address' => 'Library Hall',
                'time' => now()->addDays(3)->setTime(17, 0),
            ],
            [
                'name' => 'Karaoke Madness',
                'description' => 'Sing your heart out with your friends!',
                'category' => 'Parties',
                'image' => 'karaoke.jpg',
                'organizer' => 'Events Team',
                'vibe_score' => 89,
                'address' => 'Student Bar',
                'time' => now()->addDays(2)->setTime(22, 0),
            ],
            [
                'name' => 'Table Tennis Knockout',
                'description' => 'Winner takes all!',
                'category' => 'Sports',
                'image' => 'pingpong.jpg',
                'organizer' => 'Sports Committee',
                'vibe_score' => 72,
                'address' => 'Gym Basement',
                'time' => now()->addDays(4)->setTime(12, 0),
            ],
            [
                'name' => 'Campus Cleanup Day',
                'description' => 'Help keep our campus clean and green.',
                'category' => 'Creative',
                'image' => 'cleanup.jpg',
                'organizer' => 'Eco Club',
                'vibe_score' => 60,
                'address' => 'Main Entrance',
                'time' => now()->addDays(1)->setTime(9, 0),
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
