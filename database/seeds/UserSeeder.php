<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'monsajj',
                'email' => 'monsajj@email.com',
                'password' => '$2y$10$/N/n/vPWquUlt3KeOSeiP.pHeaxihVGdROaXG4MvKk8b8JnOkoZ.S',
                'email_verified_at' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => '$2y$10$/N/n/vPWquUlt3KeOSeiP.pHeaxihVGdROaXG4MvKk8b8JnOkoZ.S',
                'email_verified_at' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
