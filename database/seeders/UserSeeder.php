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
            'phone' => '6287771162011',
            'address' => 'Jl. Murtajih, Pamekasan',
            'thumbnail' => 'https://api.unira.ac.id/img/profil/mhs/c5ff6062a0ab2e83f6b3e3bf4c29302e.jpg'
            
        ]);
        User::factory(3)->create();
        $type = ['Pantai', 'Gunung', 'Kota', 'Hutan', 'Pulau', 'Bukit', 'Air Terjun', 'Danau', 'Kolam Renang', 'Taman'];
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
