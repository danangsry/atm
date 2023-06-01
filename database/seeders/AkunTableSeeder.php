<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;

class AkunTableSeeder extends Seeder
{
    public function run(): void
    {
        Akun::truncate();
        $password = Hash::make('123');

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Akun::create([
                'userid' => "AKUN" . $i, // $faker->unique()->randomDigit
                'nama' => $faker->name,
                'password' => $password,
                'saldo' => 0,
            ]);
        }
    }
}
