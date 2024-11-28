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
        if (!User::where('email', 'willian@gmail.com')->first()){ 
            User::create([
                'name' => 'Willian',
                'email' => 'willian@gmail.com',
                'password' => Hash::make('060904w', ['rounds' => '12'])

            ]);
        }
    }
}
