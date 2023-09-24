<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

use DateTime;

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
                'name' => 'unno',
                'email' => 'g2123011@gmail.com',
                'email_verified_at' => new DateTime(), 
                'password' => 'PJ94Torn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
