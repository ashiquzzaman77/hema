@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Review</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Review Table</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total Review <span class="badge bg-danger">{{ count($review) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($review as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->review_title }}</td>
                                    <td>{{ Str::limit($item->message, 45) }}</td>
                                    <td>
                                        @if ($item->rating == 1)
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                        @elseif ($item->rating == 2)
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                        @elseif ($item->rating == 3)
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                        @elseif ($item->rating == 4)
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star"></i></span>
                                        @elseif ($item->rating == 4.5)
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-half"></i></span>
                                        @elseif ($item->rating == 5)
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                            <span class="text-warning"><i class="lni lni-star-filled"></i></span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == '1')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>

                                        @if ($item->status == '1')
                                            <a href="{{ route('review.inactive', $item->id) }}"
                                                class="btn btn-success btn-sm" title="Inactive"><i
                                                    class="fa-solid fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('review.active', $item->id) }}" class="btn btn-success btn-sm"
                                                title="Inactive"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif

                                        <a href="{{ route('delete.review', $item->id) }}" class="btn btn-danger btn-sm"
                                            id="delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
