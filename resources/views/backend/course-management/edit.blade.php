@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Edit Course')

@section('page-content')

    <form action="{{ route('course.update', $course->id) }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="courseTitle" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="courseTitle" name="courseTitle"
                                value="{{ $course->name }}">
                            @error('courseTitle')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control description" name="description" rows="5" id="description"
                                placeholder="Description here..."> {{ $course->description }}</textarea>
                            @error('description')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control requirements" name="requirements" rows="5" id="requirements"
                                placeholder="Requirements here...">{{ $course->requirements }}</textarea>
                            @error('requirements')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label for="audience" class="form-label">Audience</label>
                            <textarea class="form-control audience" name="audience" rows="5" id="audience" placeholder="Audience here...">
                                {{ $course->audience }}
                            </textarea>
                            @error('audience')
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
                        <button class="btn btn-info waves-effect waves-light" type="submit">Edit Course</button>
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
                            <option value="active" {{ $course->status == 'active' ? 'selected' : '' }}>
                                Private
                            </option>
                            <option value="inactive" {{ $course->status == 'inactive' ? 'selected' : '' }}>Public
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

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Course Meta</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="teacher" class="form-label">Teacher</label>
                        <select class="form-select" name="teacher" id="teacher">
                            <option value="none">Select one...</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"
                                    {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('teacher')
                            <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category" id="category">
                            <option value="none">Select one...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $course->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="overflow-hidden">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" class="filepond filepond-input-circle" name="thumbnail"
                            accept="image/png, image/jpeg, image/gif" id="thumbnail" />
                        @error('thumbnail')
                            <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                        @enderror
                        <div>
                        </div>
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
        // initialize the plugins
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageTransform,
            FilePondPluginFilePoster
        );

        const inputElement = document.querySelector('#thumbnail');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            storeAsFile: true,
            files: [
        {
            // the server file reference
            source: '12345',

            // set type to local to indicate an already uploaded file
            options: {
                type: 'local',

                // optional stub file information
                file: {
                    name: 'my-file.png',
                    size: 3001025,
                    type: 'image/png',
                },

                // pass poster property
                metadata: {
                    poster: '{{asset("storage/upload")}}',
                },
            },
        },
    ],

        });

        tinymce.init({
            selector: 'textarea.description,textarea.requirements,textarea.audience',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection
