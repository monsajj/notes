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
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
