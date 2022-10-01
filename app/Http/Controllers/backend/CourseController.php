<?php

namespace App\Http\Controllers\backend;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.course-management.index')
            ->with('courses', Course::orderBy('name', 'ASC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course-management.add')->with([
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'teachers' => User::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'courseTitle'  => 'required|max:255|string',
            'description'  => 'required',
            'requirements' => 'required|string',
            'audience'     => 'required|string',
            'visibility'   => 'required|not_in:none',
            'teacher'       => 'required|not_in:none',
            'category'      => 'required|not_in:none',
            'thumbnail'    => 'required',
        ]);

        $thumb = '';
        if (!empty($request->file('thumbnail'))) {
            $thumb = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/uploads', $thumb);
        }

        Course::create([
            'name' => $request->courseTitle,
            'slug' => Str::slug($request->courseTitle),
            'description' => $request->description,
            'requirements' => $request->requirements,
            'audience' => $request->audience,
            'status' => $request->visibility,
            'category_id' => $request->category,
            'teacher_id' => $request->teacher,
            'thumbnail' => $thumb
        ]);

        $msg = 'Course added successfully';
        return redirect()->route('course.index')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        // dd($course);
        return view('backend.course-management.edit')->with([
            'course' => $course,
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'teachers' => User::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'courseTitle'  => 'required|max:255|string',
            'description'  => 'required',
            'requirements' => 'required|string',
            'audience'     => 'required|string',
            'visibility'   => 'required|not_in:none',
            'teacher'       => 'required|not_in:none',
            'category'      => 'required|not_in:none',
            // 'thumbnail'    => 'required',
        ]);

        // dd($course->thumbnail['fileName']);

        $thumb = $course->thumbnail['fileName'];

        if (!empty($request->file('thumbnail'))) {
            Storage::delete('public/uploads/' . $thumb);
            $thumb = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/uploads', $thumb);
        }

        $course->update([
            'name' => $request->courseTitle,
            'slug' => Str::slug($request->courseTitle),
            'description' => $request->description,
            'requirements' => $request->requirements,
            'audience' => $request->audience,
            'status' => $request->visibility,
            'category_id' => $request->category,
            'teacher_id' => $request->teacher,
            'thumbnail' => $thumb
        ]);

        $msg = 'Course updated successfully';
        return redirect()->route('course.index')->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Storage::delete('public/uploads/' . $course->thumbnail['fileName']);
        $course->delete();
        $msg = 'Course delete successfully';
        return redirect()->route('course.index')->with('success', $msg);
    }
}
