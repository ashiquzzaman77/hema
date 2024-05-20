@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">District</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">District Table</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal"
                    class="btn btn-outline-primary rounded-0">Add District</button>
            </div>

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total District <span class="badge bg-danger">{{ count($district) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($district as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $item['division']['division_name'] }}</td>
                                    <td>{{ $item->district_name }}</td>

                                    <td>
                                        <a href="{{ route('edit.district', $item->id) }}" class="btn btn-success btn-sm"
                                            title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('delete.district', $item->id) }}" class="btn btn-danger btn-sm"
                                            id="delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">

        @php
            $divisions = App\Models\Division::orderBy('division_name', 'ASC')->get();
        @endphp

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add District</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.district') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Division Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select name="division_id" class="form-select @error('division_id') is-invalid @enderror"
                                    id="">
                                    <option selected disabled>Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                    @endforeach
                                </select>

                                @error('division_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">District Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input autocomplete="off" required type="text" name="district_name"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-dark rounded-0 px-3" value="Save Changes" />
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
