@extends('backend.layout.master')
@section('title', 'Shikhi | Dashboard')
@section('page', 'Course')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Striped Rows -->
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Requirement</th>
            <th scope="col">Audience</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course )
            <tr>
            <th scope="row">1</th>
            <td>{{$course->category->name}}</td>
            <td>Nov 14, 2021</td>
            <td>$2,410</td>
            <td>$2,410</td>
            <td>$2,410</td>
            <td>$2,410</td>
            <td><span class="badge bg-success">Confirmed</span></td>
        </tr>
        @empty
            <tr>
            <td colspan="8">
No more data founds
            </td>
        </tr>
        @endforelse




    </tbody>
</table>

<div>
    {{$courses->links()}}
</div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
