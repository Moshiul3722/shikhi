<?php

namespace App\Http\Controllers\backend;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TemporaryFile;

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
        // dd($request->all());

        $request->validate([
            'courseTitle'  => 'required|max:255|string',
            'description'  => 'required',
            'requirements' => 'required|string',
            'visibility'   => 'required|not_in:none',
            'audience'     => 'required',
            'category'     => 'required|not_in:none',
            'courseFile'    => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $thumb = '';
        if (!empty($request->file('courseFile'))) {
            $thumb = time() . '-' . $request->file('courseFile')->getClientOriginalName();
            $request->file('courseFile')->storeAs('public/uploads', $thumb);
        }

        $course = Course::create([
            'name' => $request->courseTitle,
            'slug' => Str::slug($request->courseTitle),
            'description' => $request->description,
            'requirements' => $request->requirements,
            'audience' => $request->audience,
            'category_id' => 2,
            'teacher_id' => 2,
            'thumbnail' => $thumb,
        ]);

        // $temporaryFile = TemporaryFile::where('folder', $request->courseFile)->first();
        // if ($temporaryFile) {
        //     $course->addMedia(storage_path('app/public/avatars/temp' . $request->courseFile . '/' . $temporaryFile->filename))->toMediaCollection('courseFile');
        //     rmdir(storage_path('app/public/avatars/temp' . $request->courseFile));
        //     $temporaryFile->delete();
        // }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
