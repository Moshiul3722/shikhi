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
                            <label for="youLearn" class="form-label">What Will You Learn?</label>
                            <x-tinymce-editor name="youLearn">{{ $course->youLearn }}</x-tinymce-editor>

                            @error('description')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <x-tinymce-editor name="description">{{ $course->description }}</x-tinymce-editor>

                            @error('description')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label for="requirements" class="form-label">Requirements</label>
                            <x-tinymce-editor name="requirements">{{ $course->requirements }}</x-tinymce-editor>

                            @error('requirements')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label for="audience" class="form-label">Audience</label>
                            <x-tinymce-editor name="audience">{{ $course->audience }}</x-tinymce-editor>

                            @error('audience')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label for="audience" class="form-label">Lessons</label>



                            <div class="list-group col nested-list nested-sortable-handle sortable-lessons">

                                @forelse ($course->lessons as $lesson)
                                    <div class="list-group-item nested-2 cursor-pointer" data-index={{ $lesson->id }}
                                        data-position={{ $lesson->positions }}><i
                                            class="ri-drag-move-fill align-bottom handle"></i> {{ $lesson->name }}</div>

                                @empty
                                    <p class="text-center border rounded border-danger p-2 text-danger cursor-pointer">
                                        No Lessons found yet!!!
                                    </p>
                                @endforelse


                            </div><!-- end card-body -->

                            @error('audience')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-info waves-effect waves-light" type="submit">Update Course</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-success waves-effect waves-light"
                            href="{{ route('lesson.create') }}?course_id={{ $course->id }}">Add Lesson</a>
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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>



    <script>
        $(document).ready(function() {

            $(function() {
                $('.sortable-lessons').sortable({
                    opacity: 0.8,
                    cursor: 'move',
                    update: function() {
                        var order = $(this).sortable("serialize");
                        $.ajax({
                            url: "{{ route('lesson.sortable') }}",
                            method: 'POST',
                            data: {
                                order: order,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                $('.response').css({
                                    "display": "block",
                                    "padding": "4px",
                                    "text-align": "center",
                                    "background": "#03D87F",
                                    'color': "#fff"
                                });
                                $('.response').html(response);
                                $('.response').slideDown('slow')
                                // slideout()
                            }
                        });
                    }
                })
            })

        });


        function slideout() {
            let positions = [];
            $('.updated').each(function() {
                positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                $(this).removeClass('updated');
            });
        }

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
            files: [{
                // the server file reference
                source: '{{ rand(12, 1232333) }}',

                // set type to local to indicate an already uploaded file
                options: {
                    type: 'local',

                    // optional stub file information
                    file: {
                        name: '{{ $course->thumbnail }}',
                        type: 'image/png',
                    },

                    // pass poster property
                    metadata: {
                        poster: "{{ getAssetUrl($course->thumbnail, 'storage/uploads') }}",
                    },
                },
            }, ],

        });
    </script>
@endsection
