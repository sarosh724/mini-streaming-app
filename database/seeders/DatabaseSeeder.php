<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MusicCategory;
use App\Models\Track;
use App\Models\User;
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

        User::factory(1)->create(); // creating admin

        $musicCategoryArray = [
            [
                'name' => 'Pop'
            ],
            [
                'name' => 'Rock'
            ]
        ];
        MusicCategory::insert($musicCategoryArray);

        $tracksArray = [
            [
                'title' => 'escape to la',
                'type' => 'audio',
                'music_category_id' => '1',
                'file_path' => 'The Weeknd - Escape From LA (Audio).mp3',
                'thumbnail_path' => 'After-Hours-pic-900x900.jpg'
            ],
            [
                'title' => 'blinding lights',
                'type' => 'audio',
                'music_category_id' => '2',
                'file_path' => 'The Weeknd - Blinding Lights (Official Audio).mp3',
                'thumbnail_path' => 'maxresdefault.jpg'
            ],[
                'title' => 'starboy',
                'type' => 'audio',
                'music_category_id' => '2',
                'file_path' => 'The Weeknd - Starboy ft. Daft Punk (Official Video).mp3',
                'thumbnail_path' => '7aa3bebecdfc0a7f9140c479bcb52182.1000x1000x1.png'
            ],[
                'title' => 'reminder',
                'type' => 'audio',
                'music_category_id' => '1',
                'file_path' => 'The Weeknd - Reminder (Official Video).mp3',
                'thumbnail_path' => 'artworks-000572576414-wv5aab-t500x500.jpg'
            ],[
                'title' => 'we found love',
                'type' => 'audio',
                'music_category_id' => '1',
                'file_path' => 'Rihanna - We Found Love ft. Calvin Harris.mp3',
                'thumbnail_path' => 'artworks-000241189534-m3gpgu-t500x500.jpg'
            ],[
                'title' => 'less than zero',
                'type' => 'audio',
                'music_category_id' => '2',
                'file_path' => 'The Weeknd - Less Than Zero (Audio).mp3',
                'thumbnail_path' => '1064f7164980613.Y3JvcCw5OTksNzgyLDAsMTA4.png'
            ],[
                'title' => 'one kiss',
                'type' => 'audio',
                'music_category_id' => '1',
                'file_path' => 'Calvin Harris, Dua Lipa - One Kiss (Official Video).mp3',
                'thumbnail_path' => 'GettyImages-545603262_dua_lipa_1000-696x442.jpg'
            ],[
                'title' => 'cry me a river',
                'type' => 'audio',
                'music_category_id' => '2',
                'file_path' => 'Justin Timberlake - Cry Me A River (Official Video).mp3',
                'thumbnail_path' => 'artworks-000069905189-mwrg8a-t500x500.jpg'
            ],[
                'title' => 'in da club',
                'type' => 'video',
                'music_category_id' => '1',
                'file_path' => '50 Cent - In Da Club (Official Music Video).mp4',
                'thumbnail_path' => 'indaclub.jpg'
            ],[
                'title' => 'new rules',
                'type' => 'video',
                'music_category_id' => '2',
                'file_path' => 'Dua Lipa - New Rules (Official Music Video).mp4',
                'thumbnail_path' => 'new-rules.jpeg'
            ],[
                'title' => 'dusk till dawn',
                'type' => 'video',
                'music_category_id' => '1',
                'file_path' => 'ZAYN - Dusk Till Dawn (Official Video) ft. Sia.mp4',
                'thumbnail_path' => 'index.jpeg'
            ]
            ];

        Track::insert($tracksArray);
    }
}
