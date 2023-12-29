<?php

namespace Database\Seeders;

use App\Models\Passenger;
use App\Models\TypeTour;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->create();
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
