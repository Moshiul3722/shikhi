@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'User Role')

@section('page-content')
    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    {{-- <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Input Example</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <label for="form-grid-showcode" class="form-label text-muted">Show
                                                    Code</label>
                                                <input class="form-check-input code-switcher" type="checkbox"
                                                    id="form-grid-showcode">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-4 col-md-6">
                                                    <div>
                                                        <form action="{{ route('role.store') }}" method="POST">
                                                            @csrf
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Type role name">

                                                            @error('name')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                            <button type="submit"
                                                                class="btn btn-success btn-label waves-effect waves-light mt-3"><i
                                                                    class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>
                                                                Add Role</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-2 col-md-6"></div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <!-- Striped Rows -->
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Id</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @forelse ($roles as $key=>$role)
                                                                <tr>
                                                                    <th scope="row">{{ ++$key }}</th>
                                                                    <td>{{ $role->name }}</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-warning btn-icon waves-effect waves-light"><i
                                                                                class="ri-edit-box-fill"></i></button>
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                                class="ri-delete-bin-5-line"></i></button>
                                                                    </td>

                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="2" class="fs-5 text-center">No role
                                                                        found</td>
                                                                </tr>
                                                            @endforelse


                                                        </tbody>
                                                    </table>
                                                </div>
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
