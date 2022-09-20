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
                                                        <form
                                                            action="{{ request('name') ? route('role.store', request('name')) : route('role.store') }}"
                                                            method='POST'>
                                                            @csrf
                                                            @if (request('id'))
                                                                @method('PUT')
                                                            @endif
                                                            @if (request('id'))
                                                                <input type="hidden" value="{{ request('id') }}"
                                                                    name="id" />
                                                            @endif
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Type role name"
                                                                value="{{ old('name') ?? request('name') }}">

                                                            @error('name')
                                                                <p class="mb-0"><small
                                                                        class="text-danger fs-6">{{ $message }}</small></p>
                                                            @enderror
                                                            <button type="submit"
                                                                class="btn btn-success btn-label waves-effect waves-light mt-3"><i
                                                                    class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>
                                                                {{ request('name') ? 'Update' : 'Create' }}</button>
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
                                                                <th scope="col" class="text-center">Id</th>
                                                                <th scope="col" class="text-center">Name</th>
                                                                <th scope="col" class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @forelse ($roles as $key=>$role)
                                                                <tr>
                                                                    <td scope="row" class="text-center">
                                                                        {{ ++$key }}</td>
                                                                    <td class="text-center">{{ $role->name }}</td>
                                                                    <td class="text-center">
                                                                        <a href="{{ route('user.role.index') }}?name={{ $role->name }}"
                                                                            class="btn btn-warning btn-icon waves-effect waves-light"><i
                                                                                class="ri-edit-box-fill"></i></a>
                                                                        <a href="#"
                                                                            class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                                class="ri-delete-bin-5-line"></i></a>
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
