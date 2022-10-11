<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function courses()
    {
        return [
            'error' => false,
            'courses' => Course::get()
        ];
    }

    public function categories()
    {
        return [
            'error' => false,
            'category' => Category::get()
        ];
    }
    public function course($id)
    {
        $course =
        DB::table('courses')
        ->select('courses.*', 'lessons.name as lesson_name')
        ->join('lessons', 'lessons.course_id', '=', 'courses.id')
        ->where('courses.id', $id)
        ->get();
        return [
            'error' => false,
            'course'=>$course
        ];
    }
}
