@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'User')

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row gy-4">
                                            <div class="col-xl-12">
                                                <div class="card-body">
                                                    <div class="live-preview">
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table table-striped table-nowrap align-middle mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">ID</th>
                                                                        <th scope="col">Image</th>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Email</th>
                                                                        <th scope="col">Phone</th>
                                                                        <th scope="col">Role</th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($users as $key=>$user)
                                                                        <tr>
                                                                            <td class="fw-medium">{{ ++$key }}</td>
                                                                            <td>

                                                                                <img class="user-image"
                                                                                    src="{{ $user->thumbnail['url'] }}"
                                                                                    alt="" srcset="">
                                                                            </td>
                                                                            <td>{{ $user->name }}</td>
                                                                            <td>{{ $user->email }}</td>
                                                                            <td>{{ $user->phone }}</td>
                                                                            <td>{{ $user->role }}</td>
                                                                            <td>{{ $user->status }}</td>
                                                                            <td>
                                                                                <a href="#"><i
                                                                                        class="ri-edit-line fs-4 text-primary"></i></a>
                                                                                <a href="#"><i
                                                                                        class="ri-eye-line fs-4 text-success"></i></a>
                                                                                <a href="#"><i
                                                                                        class="ri-delete-bin-5-line fs-4 text-danger"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="8" class="fs-5 text-center">
                                                                                No records are found
                                                                            </td>
                                                                        </tr>
                                                                    @endforelse

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div><!-- end card-body -->

                                                <!-- end card -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!--end row-->
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
