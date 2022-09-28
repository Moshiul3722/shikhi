@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Course')

@section('page-content')
<<<<<<< Updated upstream
    <div class="row">
=======

    <form action="{{ route('course.store') }}" class="row" method="POST" enctype="multipart/form-data">
        @csrf
>>>>>>> Stashed changes
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="courseTitle" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="courseTitle" name="courseTitle">
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control description" id="description" name="description" rows="5"  placeholder="Course description here ..."></textarea>
                        </div>
                        <div class="col-12">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control requirements" id="requirements" name="requirements" rows="5" placeholder="Course Requirements here ..."></textarea>
                        </div>
                        <div class="col-12">
                            <label for="audience" class="form-label">Audience</label>
                            <textarea class="form-control audience" id="audience" name="audience" rows="5" placeholder="Course audience here ..."></textarea>
                        </div>
<<<<<<< Updated upstream
                        <div class="col-12">
                            <label for="validationTextarea" class="form-label">Textarea</label>
                            <textarea class="form-control" rows="5" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>

                        <div>
                        <p class="text-muted">Add Attached files here.</p>
                            <input name="file" type="file" multiple="multiple" id="courseImage">


                        <!-- end dropzon-preview -->
=======




>>>>>>> Stashed changes
                    </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->


            <!-- end card -->

        </div>
        <!-- end col -->
        <div class="col-lg-4">
<<<<<<< Updated upstream

            <!-- Base Example -->
            <!-- Accordions Bordered -->
            <div class="accordion card"
                id="accordionBordered">
                <div class="accordion-item shadow">
                    <h2 class="accordion-header" id="accordionborderedExample1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accor_borderedExamplecollapse1" aria-expanded="true"
                            aria-controls="accor_borderedExamplecollapse1">
                            What is User Interface Design?
                        </button>
                    </h2>
                    <div id="accor_borderedExamplecollapse1" class="accordion-collapse collapse show"
                        aria-labelledby="accordionborderedExample1" data-bs-parent="#accordionBordered">
                        <div class="accordion-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                            3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua nulla assumenda shoreditch et.
                        </div>
=======
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Add Course</button>
>>>>>>> Stashed changes
                    </div>
                </div>


            </div>
<<<<<<< Updated upstream




            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Privacy</h5>
                </div>
                <div class="card-body">
                    <div>
                        <label for="choices-privacy-status-input" class="form-label">Status</label>
                        <select class="form-select" data-choices data-choices-search-false
                            id="choices-privacy-status-input">
                            <option value="Private" selected>Private</option>
                            <option value="Team">Team</option>
                            <option value="Public">Public</option>
                        </select>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tags</h5>
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
                        <input class="form-control" id="choices-text-input" data-choices
                            data-choices-limit="Required Limit" placeholder="Enter Skills" type="text"
                            value="UI/UX, Figma, HTML, CSS, Javascript, C#, Nodejs" />
                    </div>
=======

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thumbnail</h5>
                </div>
                <div class="card-body">
                    <input name="courseFile" name="thumbnail" type="file" multiple="multiple" id="courseFile">
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
<<<<<<< Updated upstream
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
=======

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
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     }
            // }
        });

        // Add tinymce editor
        tinymce.init({
            selector: 'textarea.description,textarea.requirements,textarea.audience',
            plugins: 'code table lists',
            browser_spellcheck: true,
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endsection
>>>>>>> Stashed changes
