@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Course')

@section('page-content')

    <form action="{{ route('course.store') }}" method="POST" class="row">
        @csrf
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="courseTitle" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="courseTitle" name="courseTitle">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control requirements" name="requirements" rows="5" id="requirements"
                                placeholder="Requirements here..."></textarea>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="audience" class="form-label">Audience</label>
                            <textarea class="form-control audience" name="audience" rows="5" id="audience" placeholder="Audience here..."></textarea>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control description" name="description" rows="5" id="description"
                                placeholder="Description here..."></textarea>
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
                            <option value="none">Select one...</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
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
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category" id="category">
                            <option value="none">Select one...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <p class="text-muted">Add Attached files here.</p>
                        <input name="courseFile" type="file" multiple="multiple" id="courseFile">
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

        const inputElement = document.querySelector('#courseFile');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            storeAsFile: true
            // server: {
            //     url: '{{ route('upload') }}',
            //     headers: {
            //         'X-CSRF-Token': '{{ csrf_token() }}'
            //     }
            // }
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
