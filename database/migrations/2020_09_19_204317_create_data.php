<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('characters')->insert([
            [
                'id'=> 1,
                'name'=> 'Iron Man',
                'description'=> 'Genius billionaire playboy philanthropist in a suit of armor',
                'thumbnail'=> 'iron-man.png'
            ],
            [
                'id'=> 2,
                'name'=> 'Spider Man',
                'description'=> 'Your Friendly Neighborhood Hero',
                'thumbnail'=> 'spider-man.png'
            ],
            [
                'id'=> 3,
                'name'=> 'Thor',
                'description'=> 'Asgardian God the came to earth',
                'thumbnail'=> 'thor.png'
            ]
        ]);

        DB::table('comics')->insert([
            [
                'id'=> 1,
                'title'=> 'Avengers',
                'description' => 'The Avengers team is created by Nick Fury',
                'diamond_code'=> '00150',
                'ean'=> '12345678',
                'issn'=> '123456789012',
                'format'=> 'hardcover',
                'page_count'=> 98,
                'thumbnail'=> 'avengers.png'
            ],
            [
                'id'=> 2,
                'title'=> 'Avengers Age of Ultron',
                'description' => 'The Avengers are facing new enemy created by Tony Stark',
                'diamond_code'=> '00151',
                'ean'=> '23456781',
                'issn'=> '234567890121',
                'format'=> 'comic',
                'page_count'=> 120,
                'thumbnail'=> 'avengers-age-of-ultron.png'
            ],
            [
                'id'=> 3,
                'title'=> 'Avengers Infinity War',
                'description' => 'The Avengers are protecting the inifinity stones',
                'diamond_code'=> '00152',
                'ean'=> '34567812',
                'issn'=> '345678901212',
                'format'=> 'trade paperback',
                'page_count'=> 170,
                'thumbnail'=> 'avengers-infinity-wars.png'
            ],
        ]);

        DB::table('events')->insert([
            [
                'id'=> 1,
                'title'=> 'Comic Con San Diego 2018',
                'description'=> 'The biggest nerd event of 2018',
                'start' => '2018-08-01 00:00:00',
                'end'=> '2018-08-05 00:00:00',
                'thumbnail'=> 'comic-con-2018.png'
            ],
            [
                'id'=> 2,
                'title'=> 'Comic Con San Diego 2019',
                'description'=> 'The biggest nerd event of 2019',
                'start' => '2019-08-01 00:00:00',
                'end'=> '2019-08-05 00:00:00',
                'thumbnail'=> 'comic-con-2018.png'
            ],
            [
                'id'=> 3,
                'title'=> 'Comic Con San Diego 2020',
                'description'=> 'The biggest nerd event of 2020',
                'start' => '2020-08-01 00:00:00',
                'end'=> '2019-08-05 00:00:00',
                'thumbnail'=> 'comic-con-2018.png'
            ],
        ]);

        DB::table('series')->insert([
            [
                'id'=> 1,
                'title'=> 'Serie 1',
                'description'=> 'descrition for serie 1',
                'start_year'=> '2010',
                'end_year'=> '2011',
                'thumbnail'=> 'serie1.png'
            ],
            [
                'id'=> 2,
                'title'=> 'Serie 2',
                'description'=> 'descrition for serie 2',
                'start_year'=> '2013',
                'end_year'=> '2014',
                'thumbnail'=> 'serie2.png'
            ],
            [
                'id'=> 3,
                'title'=> 'Serie 3',
                'description'=> 'descrition for serie 3',
                'start_year'=> '2016',
                'end_year'=> '2019',
                'thumbnail'=> 'serie3.png'
            ],
        ]);

        DB::table('stories')->insert([
            [
                'id'=> 1,
                'title'=> 'Story 1',
                'description'=> 'descrition for story 1',
                'type'=> 'story',
                'thumbnail'=> 'story1.png'
            ],
            [
                'id'=> 2,
                'title'=> 'Story 2',
                'description'=> 'descrition for Story 2',
                'type'=> 'cover',
                'thumbnail'=> 'story2.png'
            ],
            [
                'id'=> 3,
                'title'=> 'Story 3',
                'description'=> 'descrition for Story 3',
                'type'=> 'text story',
                'thumbnail'=> 'story3.png'
            ],
        ]);

        DB::table('character_comic')->insert([
            [
                'character_id'=>1,
                'comic_id'=>1
            ],
            [
                'character_id'=>1,
                'comic_id'=>2
            ],
            [
                'character_id'=>1,
                'comic_id'=>3
            ],
            [
                'character_id'=>2,
                'comic_id'=>1
            ],
            [
                'character_id'=>2,
                'comic_id'=>2
            ],
            [
                'character_id'=>2,
                'comic_id'=>3
            ],
            [
                'character_id'=>3,
                'comic_id'=>3
            ]
        ]);

        DB::table('character_event')->insert([
            [
                'character_id'=>1,
                'event_id'=>1,
            ],
            [
                'character_id'=>2,
                'event_id'=>2,
            ],
            [
                'character_id'=>3,
                'event_id'=>3,
            ],
        ]);

        DB::table('character_serie')->insert([
            [
                'character_id'=>1,
                'serie_id'=>2,
            ],
            [
                'character_id'=>2,
                'serie_id'=>3,
            ],
            [
                'character_id'=>3,
                'serie_id'=>1,
            ],
        ]);

        DB::table('character_story')->insert([
            [
                'character_id'=>1,
                'story_id'=>3,
            ],
            [
                'character_id'=>2,
                'story_id'=>1,
            ],
            [
                'character_id'=>3,
                'story_id'=>2,
            ],
        ]);

        DB::table('comic_event')->insert([
            [
                'comic_id'=> 1,
                'event_id'=> 1,
            ],
            [
                'comic_id'=> 2,
                'event_id'=> 2,
            ],
            [
                'comic_id'=> 3,
                'event_id'=> 3,
            ]
        ]);

        DB::table('comic_serie')->insert([
            [
                'comic_id'=> 1,
                'serie_id'=> 1,
            ]
        ]);

        DB::table('comic_story')->insert([
            [
                'comic_id'=> 2,
                'story_id'=> 2
            ]
        ]);
        
        DB::table('event_serie')->insert([
            [
                'event_id'=> 1,
                'serie_id'=> 2,
            ]
        ]);

        DB::table('story_event')->insert([
            [
                'event_id'=> 2,
                'story_id'=> 3,
            ]
        ]);

        DB::table('story_serie')->insert([
            [
                'serie_id'=> 1,
                'story_id'=> 3,
            ]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('characters')->truncate();
        DB::table('comics')->truncate();
        DB::table('events')->truncate();
        DB::table('series')->truncate();
        DB::table('stories')->truncate();
        DB::table('character_comic')->truncate();
        DB::table('character_event')->truncate();
        DB::table('character_serie')->truncate();
        DB::table('character_story')->truncate();
        DB::table('comic_event')->truncate();
        DB::table('comic_serie')->truncate();
        DB::table('comic_story')->truncate();
        DB::table('event_serie')->truncate();
        DB::table('story_event')->truncate();
        DB::table('story_serie')->truncate();
    }
}
