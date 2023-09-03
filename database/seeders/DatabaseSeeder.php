<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Produck;

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
            'nama' => 'Admin',
            'user_name' => 'admin',
            'email' => 'adminp@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'nama' => 'Idham',
            'user_name' => 'idham',
            'email' => 'idhamasegap@gmail.com',
            'level' => 'desainer',
            'password' => bcrypt('123456789')
        ]);

        // User::factory(10)->create();

        // Produck::factory(50)->create();

        Category::create([
            'nama' => 'Logo',
            'slug' => 'logo'
        ]);
        Category::create([
            'nama' => 'Asset Game 2D',
            'slug' => 'asset-game-2d'
        ]);
        Category::create([
            'nama' => 'Animasi',
            'slug' => 'animasi'
        ]);
    }
}
