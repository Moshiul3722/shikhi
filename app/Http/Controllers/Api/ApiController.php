<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

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
    public function lessons()
    {
        return [
            'error' => false,
            'category' => Category::get()
        ];
    }
}
