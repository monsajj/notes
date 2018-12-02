<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'src' => 'public/template.png',
                'name' => 'template.png',
                'type' => 'image',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
