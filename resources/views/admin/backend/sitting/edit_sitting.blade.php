@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sitting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sitting</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('update.sitting') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                                    <div class="modal-body">


                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <h6 class="mb-2">Email</h6>

                                                <input required autocomplete="off" type="email"
                                                    value="{{ $edit->email }}" name="email" class="form-control" />
                                            </div>



                                            <div class="col-4">
                                                <h6 class="mb-2">Phone</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->phone }}" name="phone" class="form-control" />
                                            </div>



                                            <div class="col-4">
                                                <h6 class="mb-2">Address</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->address }}" name="address" class="form-control" />
                                            </div>



                                            <div class="col-4">
                                                <h6 class="mb-2">Offer</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->offer }}" name="offer" class="form-control" />
                                            </div>



                                            <div class="col-4">
                                                <h6 class="mb-2">Facebook</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->facebook }}" name="facebook" class="form-control" />
                                            </div>



                                            <div class="col-4">
                                                <h6 class="mb-2">Twitter</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->twitter }}" name="twitter" class="form-control" />
                                            </div>

                                            <div class="col-4">
                                                <h6 class="mb-2">Linkdin</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->linkdin }}" name="linkdin" class="form-control" />
                                            </div>

                                            <div class="col-4">
                                                <h6 class="mb-2">Instagram</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->intagram }}" name="intagram" class="form-control" />
                                            </div>

                                            <div class="col-4">
                                                <h6 class="mb-2">Copyright</h6>

                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->copyright }}" name="copyright" class="form-control" />
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-9 text-secondary float-end">
                                                <input type="submit" class="rounded-0 btn btn-dark px-3"
                                                    value="Update Sitting" />
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
    {{-- Show Image --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
