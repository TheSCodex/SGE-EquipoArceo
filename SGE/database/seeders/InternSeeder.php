<?php

namespace Database\Seeders;

use App\Models\Intern;
use App\Models\User;
use App\Models\AcademicAdvisor;
use App\Models\Book;
use App\Models\BusinessAdvisor;
use App\Models\GradeOfStudy;
use App\Models\StudyGrade;
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
        $studyGrades = StudyGrade::all();

        for ($i = 0; $i < count($estudianteUserIds); $i++) {
            $advisor = $academicAdvisors[$i % count($academicAdvisors)];
            $businessAdvisor = $businessAdvisors[$i % count($businessAdvisors)];
            $book = $books[$i % count($books)];
            $degree = $studyGrades[$i % count($studyGrades)];
            $status_id = rand(1,2);
            Intern::create([
                'user_id' => $estudianteUserIds[$i],
                'academic_advisor_id' => $advisor->id,
                'business_advisor_id' => $businessAdvisor->id,
                'career_id' => $advisor->career_id != 21 ? $advisor->career_id : 10,
                'book_id' => $book->id,
                'period' => 'Mayo - Julio',
                'student_status_id' => $status_id,
                'group' => 'SM51',
                'generation' => '2022 - 2024',
                'study_grade_id' => $degree->id,
            ]);
        }
    }
}

