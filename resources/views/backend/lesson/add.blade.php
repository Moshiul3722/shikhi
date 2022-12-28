@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Add Lesson')

@section('page-content')

    <form action="{{ route('lesson.store') }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="course" class="form-label">Course</label>
                            <select class="form-select" name="course" id="course">
                                <option value="none">Select course...</option>

                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="lessonTitle" class="form-label">Lesson Title</label>
                            <input type="text" class="form-control" id="lessonTitle" name="lessonTitle"
                                value="{{ old('lessonTitle') }}">
                            @error('lessonTitle')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="content" class="form-label">Content</label>
                            <x-tinymce-editor name="content">{{ old('content') }}</x-tinymce-editor>
                            @error('content')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-success waves-effect waves-light" type="submit">Add Lesson</button>
                    </div>
                </div>
            </div>

            <!-- end card -->

        </div>
    </form>


    <!-- end row -->
@endsection
