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
                'category' => 'funk',
                'file_path' => 'The Weeknd - Escape From LA (Audio).mp3',
                'thumbnail_path' => 'After-Hours-pic-900x900.jpg'
            ],
            [
                'title' => 'blinding lights',
                'type' => 'audio',
                'category' => 'rock',
                'file_path' => 'The Weeknd - Blinding Lights (Official Audio).mp3',
                'thumbnail_path' => 'maxresdefault.jpg'
            ],[
                'title' => 'starboy',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'The Weeknd - Starboy ft. Daft Punk (Official Video).mp3',
                'thumbnail_path' => '7aa3bebecdfc0a7f9140c479bcb52182.1000x1000x1.png'
            ],[
                'title' => 'reminder',
                'type' => 'audio',
                'category' => 'hip hop',
                'file_path' => 'The Weeknd - Reminder (Official Video).mp3',
                'thumbnail_path' => 'artworks-000572576414-wv5aab-t500x500.jpg'
            ],[
                'title' => 'we found love',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'Rihanna - We Found Love ft. Calvin Harris.mp3',
                'thumbnail_path' => 'artworks-000241189534-m3gpgu-t500x500.jpg'
            ],[
                'title' => 'less than zero',
                'type' => 'audio',
                'category' => 'classic',
                'file_path' => 'The Weeknd - Less Than Zero (Audio).mp3',
                'thumbnail_path' => '1064f7164980613.Y3JvcCw5OTksNzgyLDAsMTA4.png'
            ],[
                'title' => 'one kiss',
                'type' => 'audio',
                'category' => 'pop',
                'file_path' => 'Calvin Harris, Dua Lipa - One Kiss (Official Video).mp3',
                'thumbnail_path' => 'GettyImages-545603262_dua_lipa_1000-696x442.jpg'
            ],[
                'title' => 'cry me a river',
                'type' => 'audio',
                'category' => 'rock',
                'file_path' => 'Justin Timberlake - Cry Me A River (Official Video).mp3',
                'thumbnail_path' => 'artworks-000069905189-mwrg8a-t500x500.jpg'
            ],[
                'title' => 'testing',
                'type' => 'video',
                'category' => 'classic',
                'file_path' => 'vokoscreenNG-2023-03-30_12-17-04.mkv',
                'thumbnail_path' => ''
            ]
            ];

        Track::insert($tracksArray);
    }
}
