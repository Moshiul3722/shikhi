@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Lesson')

@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Striped Rows -->
                    <table class="table table-striped" id="courseTable">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 2rem">#</th>
                                <th scope="col" style="width: 15rem">Name</th>
                                <th scope="col" style="width: 40rem">Content</th>
                                <th scope="col" style="width: 20rem">Course Name</th>
                                <th scope="col">Visibility</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lessons as $key=>$lesson)
                                <tr>
                                    <td scope="row">{{ ++$key }}</td>

                                    <td>{{ $lesson->name }}</td>

                                    <td>{!! $lesson->content !!}</td>
                                    <td>{{ $lesson->course->name }}</td>
                                    <td>{{ $lesson->visibility }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">

                                            <a href="{{ route('lesson.edit', $lesson->id) }}" class="link-primary fs-4">
                                                <span class="shikhiTT" data-bs-placement="bottom" title="Edit Lesson">
                                                    <i class="ri-settings-4-line"></i>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)" class="link-danger fs-4"
                                                onclick="deleteLesson({{ $lesson->id }})">
                                                <span class="shikhiTT" data-bs-placement="top" title="Delete Lesson">
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </span>
                                            </a>
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
                        {{ $lessons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        // using tooltip
        const tooltips = document.querySelectorAll('.shikhiTT')
        tooltips.forEach(t => {
            new bootstrap.Tooltip(t)
        });



        // Delete lesson
        function deleteLesson(id) {

            let url = "{{ route('lesson.destroy', ':id') }}";
            url = url.replace(':id', id);
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result == true) {
                    fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-Token': $("meta[name='csrf-token']").attr('content')
                            }
                        })
                        .then(() => window.location.reload());

                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            });
        }
    </script>

@endsection
