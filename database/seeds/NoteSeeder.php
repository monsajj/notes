<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            [
                'user_id' => '1',
                'file_id' => '1',
                'title' => 'first note title',
                'text' => 'First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'deathdate' => Carbon::now()->addDay(1)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '2',
                'title' => 'second note title',
                'text' => 'Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 15,
                'deathdate' => Carbon::now()->addDay(15)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '3',
                'title' => 'third note title',
                'text' => 'Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. Third note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'white',
                'lifetime' => 1,
                'deathdate' => Carbon::now()->addDay(1)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '4',
                'title' => 'fourth note title',
                'text' => 'Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. Fourth note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'white',
                'lifetime' => 1,
                'deathdate' => Carbon::now()->addDay(1)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '5',
                'title' => 'fifth note title',
                'text' => 'Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. Fifth note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'blue',
                'lifetime' => 30,
                'deathdate' => Carbon::now()->addDay(30)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '6',
                'title' => 'sixth note title',
                'text' => 'Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. Sixth note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'blue',
                'lifetime' => 1,
                'deathdate' => Carbon::now()->addDay(1)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '7',
                'title' => 'seventh note title',
                'text' => 'Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. Seventh note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'yellow',
                'lifetime' => 15,
                'deathdate' => Carbon::now()->addDay(15)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '8',
                'title' => 'eighth note title',
                'text' => 'Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. Eighth note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'yellow',
                'lifetime' => 30,
                'deathdate' => Carbon::now()->addDay(30)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '9',
                'title' => 'ninth note title',
                'text' => 'Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. Ninth note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'red',
                'lifetime' => 15,
                'deathdate' => Carbon::now()->addDay(15)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '10',
                'title' => 'tenth note title',
                'text' => 'Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'black',
                'lifetime' => 1,
                'deathdate' => Carbon::now()->addDay(1)->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
