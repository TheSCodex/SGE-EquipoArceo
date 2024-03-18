<?php

namespace Database\Seeders;

use App\Models\Intern;
use App\Models\StudentStatus;
use App\Models\User;
use Illuminate\Database\Seeder;

class InternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get valid student_status_id values from the database
        $validStatusIds = StudentStatus::pluck('id')->toArray();

        // Get existing user IDs

        // Create 10 interns with random student_status_id and user_id from the validStatusIds and existingUserIds arrays
        foreach (range(1, 10) as $index) {
            Intern::factory()->create([
                'user_id' => 1,
                'student_status_id' => $validStatusIds[array_rand($validStatusIds)],
            ]);
        }
    }
}
