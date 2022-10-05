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
                                    <option value="{{ $course->id }}">{{ $course->name }}
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
                            <textarea class="form-control content" name="content" rows="5" id="content" placeholder="Content here..."> {{ old('content') }}</textarea>
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
                        <button class="btn btn-info waves-effect waves-light" type="submit">Edit Lesson</button>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-body">
                    <div>
                        <label for="visibility" class="form-label">Visibility</label>
                        <select class="form-select" name="visibility" id="visibility">
                            <option value="none" {{ old('visibility') == 'none' ? 'selected' : '' }}>Select
                                Visibility
                            </option>
                            <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private
                            </option>
                            <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>
                                Public
                            </option>
                        </select>
                        @error('visibility')
                            <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
    </form>


    <!-- end row -->
@endsection

@section('scripts')


    <script>
        tinymce.init({
            selector: 'textarea.content',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection
