@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Course')

@section('page-content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="courseTitle" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="courseTitle" name="courseTitle">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="requirements" class="form-label">Requirements</label>
                            <input type="text" class="form-control" id="requirements" name="requirements">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="audience" class="form-label">Audience</label>
                            <input type="text" class="form-control" id="audience" name="audience">
                        </div>
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
                    </div>
                </div>


            </div>




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
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
