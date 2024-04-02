<?php

namespace Database\Seeders;

use App\Models\Intern;
use App\Models\User;
use App\Models\AcademicAdvisor;
use App\Models\Book;
use App\Models\BusinessAdvisor;
use Illuminate\Database\Seeder;

class InternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $estudianteUserIds = User::whereHas('role', function ($query) {
            $query->where('title', 'estudiante');
        })->pluck('id');

        $academicAdvisors = AcademicAdvisor::all();
        $businessAdvisors = BusinessAdvisor::all();
        $books = Book::all();

        for ($i = 0; $i < count($estudianteUserIds); $i++) {
            $advisor = $academicAdvisors[$i % count($academicAdvisors)];
            $businessAdvisor = $businessAdvisors[$i % count($businessAdvisors)];
            $book = $books[$i % count($books)];
            $status_id = rand(1,2);
            Intern::create([
                'user_id' => $estudianteUserIds[$i],
                'academic_advisor_id' => $advisor->id,
                'business_advisor_id' => $businessAdvisor->id,
                'career_id' => $advisor->career_id,
                'book_id' => $book->id,
                'period' => 'Mayo - Julio',
                "student_status_id" => $status_id
            ]);
        }
    }
}

