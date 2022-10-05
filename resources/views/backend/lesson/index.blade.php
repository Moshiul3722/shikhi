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

                                    <td>{{ $lesson->content }}</td>
                                    <td>{{ $lesson->course->name }}</td>
                                    <td>{{ $lesson->visibility }}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Static Backdrop Modal
                                            </button>

                                            <a href="{{ route('lesson.edit', $lesson->id) }}" class="link-primary fs-4">
                                                <span class="shikhiTT" data-bs-placement="bottom" title="Edit Lesson">
                                                    <i class="ri-settings-4-line"></i>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)" class="link-danger fs-4" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
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




    <div class="card">
        <!-- Static Backdrop -->

        <!-- staticBackdrop Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                            colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px">
                        </lord-icon>

                        <div class="mt-4">
                            <h4 class="mb-3">You've made it!</h4>
                            <p class="text-muted mb-4"> The transfer was not successfully received by us. the email
                                of the recipient wasn't correct.</p>
                            <div class="hstack gap-2 justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-success"
                                    onclick="deleteLesson({{ $lesson->id }})">Cancle</a>
                                <a href="javascript:void(0);" class="btn btn-link shadow-none link-success fw-medium"
                                    data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                    Delete</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>
        // using tooltip
        const tooltips = document.querySelectorAll('.shikhiTT')
        tooltips.forEach(t => {
            new bootstrap.Tooltip(t)
        });

        // Delete course
        function deleteLesson(id) {
            // if (confirm("Are you sure you want to delete this lesson?") == true) {
            let url = "{{ route('lesson.destroy', ':id') }}";
            url = url.replace(':id', id);
            alert(url);
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-Token': $("meta[name='csrf-token']").attr('content')
                }
            })
            // .then(() => window.location.reload());
            // }
        }
    </script>

@endsection
