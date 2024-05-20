@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">SMTP</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">SMTP Table</li>
                    </ol>
                </nav>
            </div>

            {{-- <div class="ms-auto">
                <a href="{{ route('add.category') }}" class="btn btn-outline-primary rounded-0">Add Category</a>
            </div> --}}

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total SMTP <span class="badge bg-danger">{{ count($smtp) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Mailer</th>
                                <th>Host</th>
                                <th>Port</th>
                                <th>Username</th>
                                <th>Form Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($smtp as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->mailer }}</td>
                                    <td>{{ $item->host }}</td>
                                    <td>{{ $item->port }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->from_address }}</td>
                                    <td>
                                        <a href="{{ route('edit.smtp', $item->id) }}" class="btn btn-success btn-sm"
                                            title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Mailer</th>
                                <th>Host</th>
                                <th>Port</th>
                                <th>Username</th>
                                <th>Form Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>



@endsection
