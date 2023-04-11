<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Music;
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

        $musicArray = [
            [
                'title' => 'escape to la',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'public/audios/The Weeknd - Escape From LA (Audio).mp3',
                'thumbnail_path' => ''
            ],
            [
                'title' => 'blinding lights',
                'type' => 'video',
                'category' => 'pop',
                'file_path' => 'public/audios/The Weeknd - Blinding Lights (Official Audio).mp3',
                'thumbnail_path' => ''
            ],[
                'title' => 'starboy',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'public/audios/The Weeknd - Starboy ft. Daft Punk (Official Video).mp3',
                'thumbnail_path' => ''
            ],[
                'title' => 'reminder',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'public/audios/The Weeknd - Reminder (Official Video).mp3',
                'thumbnail_path' => ''
            ],[
                'title' => 'we found love',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'public/audios/Rihanna - We Found Love ft. Calvin Harris.mp3',
                'thumbnail_path' => ''
            ],[
                'title' => 'less than zero',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'public/audios/The Weeknd - Less Than Zero (Audio).mp3',
                'thumbnail_path' => ''
            ],[
                'title' => 'one kiss',
                'type' => 'audio',
                'category' => 'rock',
                'file_path' => 'public/audios/Calvin Harris, Dua Lipa - One Kiss (Official Video).mp3',
                'thumbnail_path' => ''
            ],[
                'title' => 'cry me a river',
                'type' => 'video',
                'category' => 'classic',
                'file_path' => 'public/audios/Justin Timberlake - Cry Me A River (Official Video).mp3',
                'thumbnail_path' => ''
            ]
            ];

        Music::insert($musicArray);
    }
}
