@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Category')

@section('page-content')
    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gy-4">
                                        <div class="col-xxl-5 col-md-6">
                                            @if (Session('success'))
                                                <div class="alert alert-success shadow" role="alert">
                                                    {{ Session('success') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row gy-4">
                                        <div class="col-xxl-5 col-md-6 d-flex">
                                            <a href="{{ route('category.index') }}"
                                                class="btn btn-success mb-2 ms-auto">Add New Category</a>
                                        </div>
                                    </div>
                                    <div class="col-xxl-5 col-md-6">
                                        <div>
                                            <form
                                                action="{{ request('category') ? route('category.store', request('id')) : route('category.store') }}"
                                                method='POST'>
                                                @csrf
                                                @if (request('id'))
                                                    @method('PUT')
                                                @endif
                                                @if (request('id'))
                                                    <input type="hidden" value="{{ request('id') }}"
                                                        name="id" />
                                                @endif
                                                <label for="category" class="form-label">Category</label>
                                                <input type="text" class="form-control" id="category"
                                                    name="category" placeholder="Type category name"
                                                    value="{{ old('category') ?? request('category') }}">

                                                @error('category')
                                                    <p class="mb-0"><small
                                                            class="text-danger fs-6">{{ $message }}</small></p>
                                                @enderror
                                                <button type="submit"
                                                    class="btn btn-success btn-label waves-effect waves-light mt-3"><i
                                                        class="ri-check-double-line label-icon align-middle fs-16 me-2"></i>
                                                    {{ request('category') ? 'Update' : 'Create' }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">




                                                <!-- Striped Rows -->
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center">Id</th>
                                                            <th scope="col" class="text-center">Name</th>
                                                            <th scope="col" class="text-center">Slug</th>
                                                            <th scope="col" class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($categories as $key=>$category)
                                                            <tr>
                                                                <td scope="row" class="text-center">
                                                                    {{ ++$key }}</td>
                                                                <td class="text-center">{{ $category->name }}</td>
                                                                <td class="text-center">{{ $category->slug }}</td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('category.index') }}?category={{ $category->name }}&id={{ $category->id }}"
                                                                        class="btn btn-warning btn-icon waves-effect waves-light"><i
                                                                            class="ri-edit-box-fill"></i></a>

                                                                    <form class="d-inline"
                                                                        action="{{ route('category.destroy', $category) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Do you really want to delete!');">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                                class="ri-delete-bin-5-line"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4" class="fs-5 text-center">No role
                                                                    found</td>
                                                            </tr>
                                                        @endforelse


                                                    </tbody>
                                                </table>




                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>



                    <!--end col-->
                </div>
                <!--end row-->








            </div> <!-- end .h-100-->

        </div> <!-- end col -->

    </div>
@endsection
