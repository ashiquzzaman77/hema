@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">State</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit State</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('update.state') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $editstate->id }}">

                                    <div class="modal-body">

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Division Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <select name="division_id"
                                                    class="form-select @error('division_id') is-invalid @enderror"
                                                    id="">
                                                    <option selected disabled>Select Division</option>
                                                    @foreach ($divisions as $division)
                                                        <option
                                                            value="{{ $division->id }}"{{ $editstate->division_id == $division->id ? 'selected' : '' }}>
                                                            {{ $division->division_name }}</option>
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
                                                <select name="district_id"
                                                    class="form-select @error('district_id') is-invalid @enderror"
                                                    id="">
                                                    <option selected disabled>Select District</option>
                                                    @foreach ($districts as $district)
                                                        <option
                                                            value="{{ $district->id }}"{{ $editstate->district_id == $district->id ? 'selected' : '' }}>
                                                            {{ $district->district_name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('division_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">State Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input autocomplete="off" required type="text"
                                                    value="{{ $editstate->state_name }}" name="state_name"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-dark rounded-0 px-3" value="Update State" />
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- District --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district_id"]').html('');
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
