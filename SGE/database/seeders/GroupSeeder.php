<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\User;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Group::create(['name' => 'SM51', 'career_id' => '7']);
        Group::create(['name' => 'SM52', 'career_id' => '7']);
        Group::create(['name' => 'SM53', 'career_id' => '7']);
        Group::create(['name' => 'SM54', 'career_id' => '7']);

    }
    
    
    
}
