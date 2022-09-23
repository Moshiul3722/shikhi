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
                                                                        <th scope="col">Customer</th>
                                                                        <th scope="col">Date</th>
                                                                        <th scope="col">Invoice</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fw-medium">01</td>
                                                                        <td>Bobby Davis</td>
                                                                        <td>Nov 14, 2021</td>
                                                                        <td>$2,410</td>
                                                                        <td><span class="badge bg-success">Confirmed</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">02</td>
                                                                        <td>Christopher Neal</td>
                                                                        <td>Nov 21, 2021</td>
                                                                        <td>$1,450</td>
                                                                        <td><span class="badge bg-warning">Waiting</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">03</td>
                                                                        <td>Monkey Karry</td>
                                                                        <td>Nov 24, 2021</td>
                                                                        <td>$3,500</td>
                                                                        <td><span class="badge bg-success">Confirmed</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fw-medium">04</td>
                                                                        <td>Aaron James</td>
                                                                        <td>Nov 25, 2021</td>
                                                                        <td>$6,875</td>
                                                                        <td><span class="badge bg-danger">Cancelled</span>
                                                                        </td>
                                                                    </tr>
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
