<?php

namespace App\Http\Controllers\backend;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.lesson.index')->with('lessons', Lesson::orderBy('name', 'ASC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lesson.add')->with('courses', Course::orderBy('name', 'ASC')->get());
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
            'lessonTitle'  => 'required|max:255|string',
            'course'  => 'required',
            'content' => 'required|string',
            'visibility'   => 'required|not_in:none',
        ]);

        Lesson::create([
            'name' => $request->lessonTitle,
            'slug' => Str::slug($request->lessonTitle),
            'course_id' => $request->course,
            'content' => $request->content,
            'visibility' => $request->visibility,
        ]);

        Alert::success('Lesson added successfully','We have added this lesson to our course');
        // $msg = 'Lesson added successfully';
        return redirect()->route('lesson.index');
        // ->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('backend.lesson.edit')->with([
            'lesson' => $lesson,
            'courses' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'lessonTitle'  => 'required|max:255|string',
            'course'  => 'required',
            'content' => 'required|string',
            'visibility'   => 'required|not_in:none',
        ]);

        $lesson->update([
            'name' => $request->lessonTitle,
            'slug' => Str::slug($request->lessonTitle),
            'course_id' => $request->course,
            'content' => $request->content,
            'visibility' => $request->visibility,
        ]);

        Alert::success('Lesson updated successfully','You have update this lesson');
        // $msg = 'Lesson added successfully';
        return redirect()->route('lesson.index');
        // ->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lesson.index');
    }
}
