<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonResource;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        try {
            $courses = Course::where('status', 'active')->latest()->get();
            return [
                'error' => false,
                'data' => collect($courses)->map(function ($course) {
                    return new CourseResource($course);
                }),
            ];
        } catch (\Throwable$th) {
            return [
                'error' => true,
                'message' => $th->getMessage(),
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
            $course = Course::where('slug', $request->slug)->where('status', 'active')->get()->first();
            return [
                'error' => false,
                'data' => new CourseResource($course),
            ];
        } catch (\Throwable$th) {
            return [
                'error' => true,
                'message' => 'Something went wrong',
            ];
        }
    }

    /**
     * Course Enroll
     *
     * @param Request $request
     * @return void
     */
    public function courseEnroll(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer',
        ]);

        try {
            // Find Course
            $course = Course::find($request->course_id);

            // find Auth User
            $enrolled = $course->students()->sync([auth()->user()->id]);

            // If Enrolled check
            if ($enrolled['attached'] != []) {
                return [
                    // Response
                    'error' => false,
                    'message' => 'Course enrolled Successful',
                ];
            } else {
                // Response
                return [
                    'error' => true,
                    'message' => 'You already enrolled this course!',
                ];
            }
        } catch (\Throwable$th) {
            // Response
            return [
                'error' => false,
                'message' => 'Something went wrong!',
            ];
        }
    }

    public function courseWishlist(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer',
        ]);

        try {
            /**
             * Find Course
             */
            $course = Course::find($request->course_id);

            $user = auth()->user();

            /**
             * Find wishlist
             * @var User $user
             */
            $getWishlist = $user->wishlist()->find($course->id);
            if ($getWishlist) {
                return [
                    'error' => true,
                    'message' => 'You already added this course to your wishlist',
                ];
            } else {
                // Add course to wishlist
                $wishlist = $user->wishlist()->sync([$course->id]);

                // respone
                return [
                    'error' => false,
                    'message' => 'Course added to wishlist',
                ];
            }

        } catch (\Throwable$th) {
            //throw $th;
            return [
                'error' => false,
                'message' => 'Something went wrong',
            ];
        }

    }
/**
 * Undocumented function
 *
 * @param Request $request
 * @return void
 */
    public function courseReview(Request $request)
    {
        $request->validate([
            'course_id' => ['required', 'integer'],
            'star' => ['required', 'numeric', "max:5"],
            'content' => ['required', 'string'],
        ]);

        try {
            // Check user logged in
            if (!Auth::user()) {
                return [
                    'error' => true,
                    'message' => 'You need to login',
                ];
            }

            // Find course
            $course = Course::find($request->course_id);

            $user = Auth::user();

            // Check enroll course
            $courseEnroll = $course->students->find($user->id);

            // Check Course Enroll or Not
            if (!$courseEnroll) {
                return [
                    'error' => true,
                    'message' => 'You need to enroll first',
                ];
            }

            // Check and get Review from database
            $review = Review::where('course_id', $course->id)->where('student_id', $user->id)->get()->first();

            if ($review) {
                // Review Update
                $review->update([
                    'star' => $request->star,
                    'content' => $request->content,
                    'student_id' => $user->id,
                    'course_id' => $course->id,
                ]);

                // Response
                return [
                    'error' => false,
                    'message' => "Your review has been updated Successfully!",
                ];
            } else {
                // Create Review
                Review::create([
                    'star' => $request->star,
                    'content' => $request->content,
                    'student_id' => $user->id,
                    'course_id' => $course->id,
                ]);

                // Response
                return [
                    'error' => false,
                    'message' => "Your valuable review posted Successfully!",
                ];
            }

        } catch (\Throwable$th) {
            //throw $th;
        }
    }

    public function courseLesson($course, $lesson)
    {
        try {
            // Find course
  $course = Course::where('slug', $course)->where('status', 'active')->get()->first();

            // Find Course lesson
            $lesson = Lesson::where('slug', $lesson)->where('course_id', $course->id);

            // Check course lesson
            if (!$lesson->get()->first()) {
                // Response
                return [
                    'error' => true,
                    'message' => 'Lesson not found',
                ];
            }

            // User Authenticate Or Not
            // Get Lesson base on User
            if (auth()->user()) {
                $user = Auth::user();
                /** @var User $user */

                // Get Course Lesson
                $checkenroll = $course->students->find($user->id);

                // Check Course Enroll or not
                if (!$checkenroll) {
                    // Response
                    return [
                        'error' => true,
                        'message' => "Your need to enroll first!",
                    ];
                }
            } else {
                // All public lesson
                $lesson = $lesson->where('status', 'active');
            }

            // Lesson Get first
            $lesson = $lesson->get()->first();

            // Response
            return [
                'error' => false,
                'data' => $lesson ? new LessonResource($lesson) : "Your need to enroll first!",
            ];

        } catch (\Throwable$th) {
            //throw $th;
            return [
                'error' => true,
                'message' => $th->getMessage(),
            ];
        }
    }

    public function lessonMarkAsComplete(Request $request)
    {
        $request->validate([
            'course_id' => ['required', 'integer'],
            'lesson_id' => ['required', 'integer'],
        ]);

        try {

            $user = Auth::user();

            /** @var User $user */

            $checkEnroll = $user->courses()->find($request->course_id);

            if(!$checkEnroll){
                return[
                    'error'=>true,
                    'message'=>'You are unauthorized'
                ];
            }

            // Get User lesson from specific Course
            $lesson_user = LessonUser::where('course_id', $request->course_id)->where('lesson_id', $request->lesson_id)->where('student_id', $user->id)->get()->first();

            // Course Delete or Make as Incomplete
            if ($lesson_user) {
                $lesson_user->delete();

                return [
                    'error' => false,
                    'message' => 'Lesson marked as incomplete',
                ];
            }

            // Course Make as Complete
            LessonUser::create([
                'course_id' => $request->course_id,
                'lesson_id' => $request->lesson_id,
                'student_id' => $user->id,
            ]);

            // Response
            return [
                'error' => false,
                'message' => "Lesson marked as complete!",
            ];

        } catch (\Throwable$th) {
            //throw $th;
            return [
                'error'   => true,
                'message' => $th->getMessage(),
            ];
        }
    }
}
