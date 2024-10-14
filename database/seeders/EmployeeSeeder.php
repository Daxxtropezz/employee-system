<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $birthdate = '2001-07-09';
        // $currentDate = Carbon::today();

        $age = Carbon::parse($birthdate)->age;

        DB::table('employees')->insert([
            // 'id' => 1,
            'username' => 'daxxy23',
            'email' => 'miraflores.john@gmail.com',
            'password' => Hash::make('password'),
            'fullname' => 'John Paul Miraflores',
            'sex' => 'male',
            'contact' => '+639561901685',
            'birthdate' => $birthdate,
            'age' => $age,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
