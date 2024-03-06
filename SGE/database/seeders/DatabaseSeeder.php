<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\BusinessSector;
use App\Models\CareerAcademy;
use App\Models\Academy;
use App\Models\Career;
use App\Models\User;
use App\Models\Division;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        BusinessSector::factory()->count(10)->create();
        Book::factory(10)->create();
        Company::factory()->count(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Division::factory()->count(5)->create();
        Academy::factory()->count(5)->create();
        Career::factory()->count(5)->create();
        Role::factory()->count(10)->create();
        CareerAcademy::factory()->count(5)->create();
        User::factory()->count(10)->create();
    }
}
