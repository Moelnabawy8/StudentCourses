<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $coursesCount = Course::count();

        // أشهر الكورسات (مرتبة بعدد الطلاب)
        $topCourses = Course::withCount('students')
            ->orderByDesc('students_count')
            ->take(5)
            ->get();

        // أحدث الطلاب
        $latestStudents = Student::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard.index', compact(
            'studentsCount', 'coursesCount', 'topCourses', 'latestStudents'
        ));
    }
}
