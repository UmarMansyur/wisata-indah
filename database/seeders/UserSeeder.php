<?php

namespace Database\Seeders;

use App\Models\Passenger;
use App\Models\TypeTour;
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
            'email' => 'admin@gmail.com',
            'username' => 'Admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'gender' => 'male',
            'phone' => '08123456789',
            'address' => 'Jl. Raya Cipadung No. 9',
            'thumbnail' => 'https://ik.imagekit.io/8zmr0xxik/70986579_uN4Oeq6SV.png'
            
        ]);
        User::factory(3)->create();
        $type = ['Pantai', 'Gunung', 'Kota', 'Hutan', 'Laut', 'Pulau'];
        foreach ($type as $key => $value) {
            TypeTour::create([
                'name' => $value
            ]);
        }
        $passenger = ['Dewasa', 'Anak-anak'];
        foreach ($passenger as $key => $value) {
            Passenger::create([
                'name' => $value
            ]);
        }
        
    }
}
