<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Data;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'lorem',
            'username' => 'lorem',
            'contact' => 'lorem',
            'password' => bcrypt('lorem123'),
        ]);
        Room::create([
            'name' => 'Istimewa',
            'slug' => 'istimewa',
        ]);
        Room::create([
            'name' => 'Modern',
            'slug' => 'modern',
        ]);
        Room::create([
            'name' => 'Aspirasi',
            'slug' => 'aspirasi',
        ]);
        \App\Models\Data::factory(10)->create();
    }
}
