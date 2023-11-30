<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arsyandi Pratama',
            'email' => 'arsyandi@gmail.com',
            'password' => Hash::make('deswasv2'),
        ]);
        User::create([
            'name' => 'Dwi Sartika',
            'email' => 'tika@gmail.com',
            'password' => Hash::make('deswasv2'),
        ]);
        User::create([
            'name' => 'Ulfah',
            'email' => 'ulfah@gmail.com',
            'password' => Hash::make('deswasv2'),
        ]);
        User::create([
            'name' => 'Farid Rachman',
            'email' => 'farid@gmail.com',
            'password' => Hash::make('deswasv2'),
        ]);
        User::create([
            'name' => 'Ricky Anggoro',
            'email' => 'ricky@gmail.com',
            'password' => Hash::make('deswasv2'),
        ]);
    }
}
