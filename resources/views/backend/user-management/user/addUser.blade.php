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
                                                    <form action="{{ route('user.store') }}" method="POST" class="row g-3"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" placeholder="Enter your name">

                                                                @error('name')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="userName" class="form-label">User Name</label>
                                                            <input type="text" class="form-control" name="userName"
                                                                id="userName" placeholder="Enter user name">

                                                                @error('userName')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Email">

                                                                @error('email')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" placeholder="Enter phone number">

                                                                @error('phone')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control" name="password"
                                                                id="password" placeholder="password">

                                                                @error('password')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="password_confirmation" class="form-label">Confirm
                                                                Password</label>
                                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                                                placeholder="Confirm Password">

                                                                @error('password_confirmation')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label for="inputState" class="form-label">Role</label>
                                                            <select name="role" id="inputState" class="form-select">
                                                                <option value="none">Select Role</option>
                                                                <option value="admin"
                                                                    {{ old('status') == 'admin' || request('status') == 'admin' ? 'selected' : '' }}>
                                                                    Admin</option>
                                                                <option value="user"
                                                                    {{ old('status') == 'user' || request('status') == 'user' ? 'selected' : '' }}>
                                                                    User</option>
                                                                <option value="teacher"
                                                                    {{ old('status') == 'teacher' || request('status') == 'teacher' ? 'selected' : '' }}>
                                                                    Teacher</option>
                                                            </select>

                                                            @error('role')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputState" class="form-label">Status</label>
                                                            <select name="status" id="inputState" class="form-select">
                                                                <option value="none">Select Status</option>
                                                                <option value="active"
                                                                    {{ old('status') == 'active' || request('status') == 'active' ? 'selected' : '' }}>
                                                                    Active</option>
                                                                <option value="inactive"
                                                                    {{ old('status') == 'inactive' || request('status') == 'inactive' ? 'selected' : '' }}>
                                                                    Inactive</option>
                                                            </select>

                                                            @error('status')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">

                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class="card-title mb-0">User Image</h4>
                                                                </div><!-- end card header -->

                                                                <div class="card-body">
                                                                    <p class="text-muted">FilePond is a JavaScript
                                                                        library with profile picture-shaped file upload
                                                                        variation.</p>
                                                                    <div class="avatar-xl mx-auto">
                                                                        <input type="file"
                                                                            class="filepond filepond-input-circle"
                                                                            name="thumbnail"
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
