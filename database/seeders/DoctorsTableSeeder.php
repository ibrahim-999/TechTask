<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->delete();
        $doctorRecords = [
            [
                'id'=>1,
                'name'=>'doctor',
                'email'=>'doctor@mail.com',
                'password'=>'$2y$10$3X7pmoUObuxq1uGCX/HqmuihdTqwJqziV73RVaa5nytWSuVOdUiui',
            ],
        ];

        DB::table('doctors')->insert($doctorRecords);

    }
}
