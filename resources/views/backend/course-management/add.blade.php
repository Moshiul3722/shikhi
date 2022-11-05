@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Add Course')

@section('page-content')

    <form action="{{ route('course.store') }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="courseTitle" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="courseTitle" name="courseTitle"
                                value="{{ old('courseTitle') }}">
                            @error('courseTitle')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="youLearn" class="form-label">What Will You Learn?</label>

                            <x-tinymce-editor name="youLearn">{{ old('youLearn') }}</x-tinymce-editor>


                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>


                            <x-tinymce-editor name="description">{{ old('description') }}</x-tinymce-editor>

                            @error('description')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label for="requirements" class="form-label">Requirements</label>
                            <x-tinymce-editor name="requirements">{{ old('requirements') }}</x-tinymce-editor>

                            @error('requirements')
                                <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label for="audience" class="form-label">Audience</label>
                            <x-tinymce-editor name="audience">{{ old('audience') }}</x-tinymce-editor>

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
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Add Course</button>
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
                            <option value="active" {{ old('visibility') == 'active' ? 'selected' : '' }}>Private
                            </option>
                            <option value="inactive" {{ old('visibility') == 'inactive' ? 'selected' : '' }}>
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
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="mb-0"><small class="text-danger fs-6">{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div>
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" class="filepond filepond-input-circle" name="thumbnail"
                            accept="image/png, image/jpeg, image/gif" id="thumbnail" />
                        @error('thumbnail')
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
        // initialize the plugins
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageTransform
        );

        const inputElement = document.querySelector('#thumbnail');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            storeAsFile: true
        });


        $(document).ready(function() {
            $('.about-course').val('');
            $('.add-more-about-course').click(function(e) {
                e.preventDefault();
                let aboutCourse = $('.about-course').val();
                //Set
                $('.aboutCourse').val(aboutCourse);

                $('#about-course>tbody').append(`
                        <tr>
                            <td class="p-0 border-0"><input type="text" value="${aboutCourse}" name="aboutCoureses[]"
                                    class="form-control mt-2" readonly></td>
                            <td class="p-0 mt-2 border-0">
                                <button type="button" class="mt-2 remove-course-about btn btn-outline-danger ms-2 btn-icon waves-effect waves-light shadow-none"><i class="ri-delete-bin-5-line"></i></button>
                            </td>
                        </tr>
                `)

                $('.about-course').val('');
            });

            $(document).on('click', '.remove-course-about', function(e) {
                e.preventDefault();
                let tr_item = $(this).parent().parent();
                $(tr_item).remove();
                4
            })
        })
    </script>
@endsection
