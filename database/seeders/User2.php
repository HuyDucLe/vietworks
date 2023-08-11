<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class User2 extends Seeder
{

    public function run()
    {
        $img = ['avatar.png','Natasha.png','logo_job.png'];

        $id = DB::table('users')->pluck('id')->toArray();
        foreach ($id as $i) {
            DB::table('users')
            ->where('id', $i)
            ->update(['avata' => $img[array_rand($img)]]);
        }
        // $fake = \Faker\Factory::create();
        // $limit = 50;

        // $ho = ['Lê','Nguyễn','Phạm','Đào','Cao','Đỗ','Trần'];
        // $ten= ['Hùng','Văn','Dũng','Đức','Tuấn','Anh','Trí','Nam','Phương','Nghĩa','Hiếu'];
        // $dem= ['Mai','Quỳnh','Trang','Huyền','Thu','Minh'];
        // $ten2=['Anh','Hương','Trang','Nguyệt','Giang','Thư','Hồng','Mỹ','Đào','Thảo'];

        // for ($i = 0; $i < $limit; $i++){
        //     $gioitinh= $fake->randomElement(['Nam', 'Nữ']);
        //     if ($gioitinh=='Nam') {
        //         DB::table('users')->insert([
        //             'name' => 	$fake->randomElement($ho).' '.$fake->randomElement($ten).' '.$fake->randomElement($ten),
        //             'sex' => $gioitinh,	
        //             'birthday' => $fake->date("Y-m-d"),
        //             'phone'	=> $fake->numerify($string = '0#########'),
        //             'email'	=> $fake->unique->email,
        //             'password' => Str::random(10),
        //             'date_join'	=> 
        //             $fake->numberBetween($min = 2000, $max = 2023).'-'.$fake->numberBetween($min = 1, $max = 12).'-'.$fake->numberBetween($min = 1, $max = 31),
        //             'avata'	=> Str::random(10).'.jpg',
        //             'file' => 'cv'.$fake->randomElement(['.pdf', '.doc']),
        //             'role' => $fake->randomElement(['admin', 'employee','candidate']),
        //         ]);
        //     } else {
        //         DB::table('users')->insert([
        //             'name' => 	$fake->randomElement($ho).' '.$fake->randomElement($dem).' '.$fake->randomElement($ten2),
        //             'sex' => $gioitinh,	
        //             'birthday' => $fake->date("Y-m-d"),
        //             'phone'	=> $fake->numerify($string = '0#########'),
        //             'email'	=> $fake->unique->email,
        //             'password' => Str::random(10),
        //             'date_join'	=> 
        //             $fake->numberBetween($min = 2000, $max = 2023).'-'.$fake->numberBetween($min = 1, $max = 12).'-'.$fake->numberBetween($min = 1, $max = 31),
        //             'avata'	=> Str::random(10).'.jpg',
        //             'file' => 'cv'.$fake->randomElement(['.pdf', '.doc']),
        //             'role' => $fake->randomElement(['employee','candidate']),
        //         ]);
        //     }
        // }

        

    }
}