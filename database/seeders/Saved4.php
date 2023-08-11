<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Saved4 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();
        $limit = 50;
        $user = DB::table('users')->pluck('id')->toArray();
        $post = DB::table('job_posts')->pluck('id')->toArray();

        for ($i = 0; $i < $limit; $i++){
            DB::table('job_saved')->insert([
                'user' =>$user[array_rand($user)],
                'job' =>$post[array_rand($post)],
                'saved' =>$fake->boolean(),
                'applied'=>$fake->boolean(),
                'accepted'=>$fake->boolean(),
                'hidden'=>$fake->boolean(),
            ]);
        }
    }
}
