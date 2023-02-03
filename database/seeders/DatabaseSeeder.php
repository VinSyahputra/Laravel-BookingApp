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
        
        // User::create([
        //     'name' => 'admin',
        //     'username' => 'admin',
        //     'contact' => 'admin',
        //     'password' => bcrypt('admin123'),
        // ]);
        // Room::create([
        //     'name' => 'Istimewa',
        //     'slug' => 'istimewa',
        // ]);
        // Room::create([
        //     'name' => 'Modern',
        //     'slug' => 'modern',
        // ]);
        // Room::create([
        //     'name' => 'Aspirasi',
        //     'slug' => 'aspirasi',
        // ]);
        \App\Models\Data::factory(1000)->create();
        // \App\Models\User::factory(40)->create();
    }
}
