<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Company1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();
        // $limit = 100;
        $province = DB::table('provinces')->pluck('name')->toArray();
        $img = ['job-logo (10).jpg','job-logo (11).jpg','job-logo (12).jpg','job-logo (13).jpg','job-logo (14).jpg','job-logo (15).jpg','job-logo (16).jpg','job-logo (17).jpg','job-logo (18).jpg','job-logo (19).jpg','job-logo.jpg','job-logo (10).png','job-logo (11).png','job-logo (12).png','job-logo (13).png','job-logo (14).png','job-logo (15).png','job-logo (16).png','job-logo.png'];

        $id = DB::table('companies')->pluck('id')->toArray();
        foreach ($id as $i) {
            DB::table('companies')
            ->where('id', $i)
            ->update(['logo' => $img[array_rand($img)]]);
        }
        // for ($i = 0; $i < $limit; $i++){
        //     $name = $fake->name;
        //     $link = Str::lower(Str::replace(' ', '', $name));
        //     DB::table('companies')->insert([
        //         'name' => $name,
        //         'intro' =>	$fake->sentence(4),
        //         'logo' => $img[array_rand($img)],
        //         'address' => $province[array_rand($province)],
        //         'employees'	=> $fake->numberBetween($min = 100, $max = 1000),
        //         'contact' => $fake->numerify($string = '0#########'),
        //         'website' => 'www.'.$link.'.com',
        //         'fb' => 'fb.com/'.$link,
        //         'gg' => 'gg.com/'.$link
        //     ]);
        // }
    }
}
