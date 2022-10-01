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
                                        <img class="avatar-xs rounded-circle" src="{{ $course->thumbnail['url'] }}"
                                            alt="" srcset="">
                                    </td>
                                    <td>{{ $course->category->name }}</td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-primary position-relative p-0 avatar-xs rounded">
                                            <span class="avatar-title bg-transparent">
                                                <i class="bx bxs-envelope"></i>
                                            </span>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1">23<span
                                                    class="visually-hidden">20</span></span>
                                        </button>
                                    </td>
                                    <td>{{ $course->status }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">
                                            <a href="{{ route('course.edit', $course->id) }}" class="link-primary fs-4">
                                                <span class="shikhiTT" data-bs-placement="bottom" title="Edit Course">
                                                    <i class="ri-settings-4-line"></i>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)"
                                                data-url="{{ route('course.destroy', $course->id) }}"
                                                class="link-danger fs-4 delect-course">

                                                <span class="shikhiTT" data-bs-placement="top" title="Delete Course">
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

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
                }
            });


            $(document).on('click', '.delect-course', function() {

                var courseURL = $(this).data('url');
                var trObj = $(this);

                if (confirm("Are you sure you want to delete this course?") == true) {
                    $.ajax({
                        url: courseURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            trObj.parents("tr").remove();
                            location.reload(true);
                            console.log('this is goru');
                        }

                    });
                }

            });

        });
    </script>

@endsection
