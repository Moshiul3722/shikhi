@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Course')

@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Striped Rows -->
                    <table class="table table-striped" id="courseTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Course Title</th>
                                <th scope="col">Lesson</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $key=>$course)
                                <tr>
                                    <td scope="row">{{ ++$key }}</td>
                                    <td>
                                        <img class="avatar-xs rounded-circle" src="{{getAssetUrl($course->thumbnail,'uploads')}}">

                                    </td>
                                    <td>{{ $course->name }}</td>
                                    <td>

                                        @if (count($course->lessons) > 0)
                                            <span
                                                class="btn btn-primary border-0 position-relative px-0 py-0 avatar-xs rounded-circle badge-gradient-danger fs-18">
                                                {{ count($course->lessons) }}
                                            </span>
                                        @else
                                            <span
                                                class="btn btn-primary position-relative px-0 py-0 avatar-xs rounded-circle badge-outline-danger fs-18">
                                                {{ count($course->lessons) }}
                                            </span>
                                            {{-- <span
                                                class="badge rounded-pill badge-outline-danger">{{ count($course->lesson) }}
                                            </span> --}}
                                        @endif
                                    </td>
                                    <td>{{ $course->status }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">
                                            <a href="{{ route('course.edit', $course->id) }}" class="link-primary fs-4">
                                                <span class="shikhiTT" data-bs-placement="bottom" title="Edit Course">
                                                    <i class="ri-settings-4-line"></i>
                                                </span>
                                            </a>
                                            {{-- <a href="javascript:void(0)" onclick="deleteCourse({{ $course->id }})"
                                                class="link-danger fs-4">
                                                <span class="shikhiTT" data-bs-placement="top" title="Delete Course">
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </span>
                                            </a> --}}

                                            <a href="javascript:void(0)" class="link-danger fs-15"
                                                onclick="deleteRecord({{ $course->id }})"><i
                                                    class="ri-delete-bin-line"></i></a>
                                            <form id="delete-form-{{ $course->id }}"
                                                action="{{ route('course.destroy', $course->id) }}" method="POST"
                                                style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center fw-bold text-danger">
                                        No more data founds
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <div>
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('scripts')

    <script>
        // using tooltip
        const tooltips = document.querySelectorAll('.shikhiTT')
        tooltips.forEach(t => {
            new bootstrap.Tooltip(t)
        });

        // Delete course


        // function deleteRecord(id) {
        //     Swal.fire({
        //         html: '<div class="mt-3"><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you want to delete?</p></div></div>',
        //         showCancelButton: !0,
        //         confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
        //         confirmButtonText: "Yes, Delete It!",
        //         cancelButtonClass: "btn btn-danger w-xs mb-1",
        //         buttonsStyling: !1,
        //         showCloseButton: false,
        //     }).then((result) => {
        //         if (result.value) {
        //             event.preventDefault();
        //             document.getElementById('delete-form-' + id).submit();
        //         }
        //     })
        // }


        // function deleteCourse(id) {
        //     if (confirm("Are you sure you want to delete this course?") == true) {
        //         let url = "{{ route('course.destroy', ':id') }}";
        //         url = url.replace(':id', id);

        //         fetch(url, {
        //                 method: 'DELETE',
        //                 headers: {
        //                     'X-CSRF-Token': $("meta[name='csrf-token']").attr('content')
        //                 }
        //             })
        //             .then(() => window.location.reload());
        //     }
        // }
    </script>

@endsection
