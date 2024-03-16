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
        $existingUserIds = User::pluck('id')->toArray();

        // Ensure there are at least 10 user IDs available
        if (count($existingUserIds) < 5) {
            // Throw an exception or handle the case where there are not enough user IDs
            // You can modify this based on your application's requirements
            throw new \Exception('There are not enough existing users to create 10 interns.');
        }

        // Create 10 interns with random student_status_id and user_id from the validStatusIds and existingUserIds arrays
        foreach (range(1, 10) as $index) {
            Intern::factory()->create([
                'user_id' => $existingUserIds[array_rand($existingUserIds)],
                'student_status_id' => $validStatusIds[array_rand($validStatusIds)],
            ]);
        }
    }
}
