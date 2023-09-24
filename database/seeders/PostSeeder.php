<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert([
                'title' => '命名の心得',
                'body' => '命名はデータを基準に考える',
                'status' => 0,
                'latitude' => '35.1233',
                'user_id' => 1, //unnoのID（外部キーなので存在するものでないと弾かれる）
                'longitude' => '139.444',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
