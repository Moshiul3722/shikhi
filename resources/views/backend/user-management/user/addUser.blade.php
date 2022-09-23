@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Add User')

@section('page-content')
    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="live-preview">


                                            <div class="row">
                                                <div class="col-12">
                                                    <form action="javascript:void(0);" class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="fullnameInput" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="fullnameInput"
                                                                placeholder="Enter your name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="fullnameInput" class="form-label">User Name</label>
                                                            <input type="text" class="form-control" id="fullnameInput"
                                                                placeholder="Enter your name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputEmail4" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="inputEmail4"
                                                                placeholder="Email">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPassword4" class="form-label">Phone</label>
                                                            <input type="password" class="form-control" id="inputPassword4"
                                                                placeholder="Password">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputEmail4" class="form-label">Password</label>
                                                            <input type="email" class="form-control" id="inputEmail4"
                                                                placeholder="Email">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPassword4" class="form-label">Confirm
                                                                Password</label>
                                                            <input type="password" class="form-control" id="inputPassword4"
                                                                placeholder="Password">
                                                        </div>


                                                        <div class="col-md-4">
                                                            <label for="inputState" class="form-label">Status</label>
                                                            <select id="inputState" class="form-select">
                                                                <option selected>Choose...</option>
                                                                <option>...</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">

                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title mb-0">Profile Picture
                                                                        Selection</h4>
                                                                </div><!-- end card header -->

                                                                <div class="card-body">
                                                                    <p class="text-muted">FilePond is a JavaScript
                                                                        library with profile picture-shaped file upload
                                                                        variation.</p>
                                                                    <div class="avatar-xl mx-auto">
                                                                        <input type="file"
                                                                            class="filepond filepond-input-circle"
                                                                            name="filepond"
                                                                            accept="image/png, image/jpeg, image/gif" />
                                                                    </div>

                                                                </div>
                                                                <!-- end card body -->
                                                            </div>
                                                            <!-- end card -->

                                                        </div>


                                                        <div class="col-12">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-primary">Add
                                                                    User</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--end col-->

                                                <!--end col-->




                                            </div>
                                            <!--end row-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->



                    </div>
                    <!--end col-->
                </div>
                <!--end row-->








            </div> <!-- end .h-100-->

        </div> <!-- end col -->

    </div>
@endsection
