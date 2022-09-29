@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Course')

@section('page-content')

    <form action="" class="row">
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
                                placeholder="Required example textarea"></textarea>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="audience" class="form-label">Audience</label>
                            <textarea class="form-control audience" name="audience" rows="5" id="audience"
                                placeholder="Required example textarea"></textarea>
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control description" name="description" rows="5" id="description"
                                placeholder="Required example textarea"></textarea>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary waves-effect waves-light" type="button">Add Course</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div>
                        <label for="choices-privacy-status-input" class="form-label">Visibility</label>
                        <select class="form-select" data-choices data-choices-search-false
                            id="choices-privacy-status-input">
                            <option value="Private" selected>Select one...</option>
                            <option value="Team">Active</option>
                            <option value="Public">Inactive</option>
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
                        <label for="choices-categories-input" class="form-label">Categories</label>
                        <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                            <option value="Designing" selected>Designing</option>
                            <option value="Development">Development</option>
                        </select>
                    </div>

                    <div>
                        <label for="choices-text-input" class="form-label">Skills</label>
                        <input class="form-control" id="choices-text-input" data-choices data-choices-limit="Required Limit"
                            placeholder="Enter Skills" type="text"
                            value="UI/UX, Figma, HTML, CSS, Javascript, C#, Nodejs" />
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
            server: '/upload'
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
