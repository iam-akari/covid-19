<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class User_postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\user_posts::factory(15)->create();
    }
}
