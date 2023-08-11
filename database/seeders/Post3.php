<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();
        $limit = 200;
        $user = DB::table('users')->pluck('id')->toArray();
        $job = DB::table('job_cates')->pluck('name')->toArray();
        $pos = DB::table('job_positions')->pluck('name')->toArray();
        $degree = DB::table('job_degree_lists')->pluck('name')->toArray();
        $province = DB::table('provinces')->pluck('name')->toArray();
        $company = DB::table('companies')->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++){
            $date = $fake->numberBetween($min = 1, $max = 31);
            $month= $fake->numberBetween($min = 1, $max = 12);
            $year= $fake->numberBetween($min = 2020, $max = 2023);
            if (($month==2||$month==4||$month==6||$month==9||$month==11)&&$date>29) $date =1;
            $date2 = $date + rand(1,29);
            $date2 = $date2 > 28 ? $date : $date2;
            $sa = rand(1,9);
            $sex = ['Nam','Nữ','Cả hai'];
            DB::table('job_posts')->insert([
                'user' =>$user[array_rand($user)],
                'name' =>$fake->sentence,
                'company' => $company[array_rand($company)],
                'job' => $job[array_rand($job)],
                'date_start' => $year.'-'.$month.'-'.$date,
                'date_end'	=> $year.'-'.$month.'-'.$date2,
                'salary_min' => $sa*1000000,
                'salary_max' => ($sa+$fake->numberBetween($min = 1, $max = 2*$sa))*1000000,
                'number' =>$fake->numberBetween($min = 1, $max = 10),
                'position' =>$pos[array_rand($pos)],
                'sex' => $sex[array_rand($sex)],
                'exp' => $fake->numberBetween($min = 1, $max = 6).array_rand(['Tháng','Năm']),
                'location' => $province[array_rand($province)],
                'des' => $fake->sentence(50),
                'requirements'	=> $degree[array_rand($degree)],
                'benefit' => $fake->sentence(20),
                'access' =>$fake->boolean(),
                'public'=>$fake->boolean()
            ]);
        }
    }
}
