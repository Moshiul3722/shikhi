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
    public function courseSingle($id)
    {
        $course = Course::findOrFail($id);
        return [
            'error' => false,
            'course'=>$course
        ];
    }
}
