<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Job3 extends Seeder
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
        $job = DB::table('job_cate')->pluck('name')->toArray();
        $position = DB::table('job_position')->pluck('name')->toArray();
        $degree = DB::table('job_degree_list')->pluck('name')->toArray();

        for ($i = 0; $i < $limit; $i++){
            DB::table('job_eperience')->insert([
                'user' =>$user[array_rand($user)],
                'job' => $job[array_rand($job)],
                'position' => $position[array_rand($position)],
                'years'	=> rand(1,5)
            ]);
        }

        for ($i = 0; $i < $limit; $i++){
            DB::table('job_degree')->insert([
                'user' =>$user[array_rand($user)],
                'name' => $degree[array_rand($degree)],
            ]);
        }
    }
}
