<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Track;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $tracksArray = [
            [
                'title' => 'escape to la',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'The Weeknd - Escape From LA (Audio).mp3',
                'thumbnail_path' => 'maxresdefault.jpg'
            ],
            [
                'title' => 'blinding lights',
                'type' => 'video',
                'category' => 'pop',
                'file_path' => 'The Weeknd - Blinding Lights (Official Audio).mp3',
                'thumbnail_path' => 'maxresdefault.jpg'
            ],[
                'title' => 'starboy',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'The Weeknd - Starboy ft. Daft Punk (Official Video).mp3',
                'thumbnail_path' => 'maxresdefault.jpg'
            ],[
                'title' => 'reminder',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'The Weeknd - Reminder (Official Video).mp3',
                'thumbnail_path' => 'maxresdefault.jpg'
            ],[
                'title' => 'we found love',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'Rihanna - We Found Love ft. Calvin Harris.mp3',
                'thumbnail_path' => ''
            ],[
                'title' => 'less than zero',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'The Weeknd - Less Than Zero (Audio).mp3',
                'thumbnail_path' => 'maxresdefault.jpg'
            ],[
                'title' => 'one kiss',
                'type' => 'audio',
                'category' => 'rock',
                'file_path' => 'Calvin Harris, Dua Lipa - One Kiss (Official Video).mp3',
                'thumbnail_path' => 'GettyImages-545603262_dua_lipa_1000-696x442.jpg'
            ],[
                'title' => 'cry me a river',
                'type' => 'video',
                'category' => 'classic',
                'file_path' => 'Justin Timberlake - Cry Me A River (Official Video).mp3',
                'thumbnail_path' => 'artworks-000069905189-mwrg8a-t500x500.jpg'
            ]
            ];

        Track::insert($tracksArray);
    }
}
