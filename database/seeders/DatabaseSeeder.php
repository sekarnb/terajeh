<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password123')
        ]);

        collect([
            'Steak',
            'Indonesian Food',
            'Pasta and Snack',
            'Cheese',
            'Dessert',
            'Drink',
        ])->each(function (string $category) {
            Category::create(['name' => $category]);
        });
    }
}
