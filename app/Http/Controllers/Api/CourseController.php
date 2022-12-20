<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        try {
            $courses = Course::where('status','active')->latest()->get();
           return[
            'error'=>false,
            'data'=> collect($courses)->map(function ($course){
                return new CourseResource($course);
            })
           ];
        } catch (\Throwable $th) {
            return[
                'error'=>true,
                'message'=>$th->getMessage()
            ];
        }
    }

    /**
     * courseSingle Method
     *
     * @param Request $request
     * @return void
     */
    public function courseSingle(Request $request)
    {
        try {
            $course = Course::where('slug',$request->slug)->where('status','active')->get()->first();
           return[
            'error'=>false,
            'data'=> new CourseResource($course)
           ];
        } catch (\Throwable $th) {
            return[
                'error'=>true,
                'message'=>'Something went wrong'
            ];
        }
    }

    public function courseEnroll(Request $request)
    {
        try {
            if(!Auth::user()){
                return[
                    'error'=>true,
                    'message'=>"You need to login"
                ];
            }

            $course = Course::where('slug',$request->slug)->where('status','active')->get()->first();
            $user = Auth::user();

// return $course;
           /**
            * @var User $user
            */
            // $user->courses()->sync([$course->id]);
            // $user->courses()->attach([$course->id]);
            $course->students()->sync([$user->id]);

           return[
            'error'=>false,
            'data'=> "Course Enrolled Successfully"
           ];
        } catch (\Throwable $th) {
            return[
                'error'=>true,
                'message'=>$th->getMessage()
            ];
        }
    }
}
