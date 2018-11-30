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
                'slug' => 'first-note-title',
                'title' => 'first note title',
                'text' => 'First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '2',
                'slug' => 'second-note-title',
                'title' => 'second note title',
                'text' => 'Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. Second note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'red',
                'lifetime' => 15,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '3',
                'slug' => 'third-note-title',
                'title' => 'third note title',
                'text' => 'Third note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '4',
                'slug' => 'fourth-note-title',
                'title' => 'fourth note title',
                'text' => 'Fourth note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '5',
                'slug' => 'fifth-note-title',
                'title' => 'fifth note title',
                'text' => 'Fifth note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '6',
                'slug' => 'sixth-note-title',
                'title' => 'sixth note title',
                'text' => 'Sixth note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '7',
                'slug' => 'seventh-note-title',
                'title' => 'seventh note title',
                'text' => 'Seventh note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'file_id' => '8',
                'slug' => 'eighth-note-title',
                'title' => 'eighth note title',
                'text' => 'Eighth note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '9',
                'slug' => 'ninth-note-title',
                'title' => 'ninth note title',
                'text' => 'Ninth note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. First note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '1',
                'file_id' => '10',
                'slug' => 'tenth-note-title',
                'title' => 'tenth note title',
                'text' => 'Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. Tenth note text. ',
                'public' => false,
                'tags' => null,
                'colour' => 'green',
                'lifetime' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
