@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Slider</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
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

                                <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                                    <input type="hidden" name="old_image" value="{{ $edit->image }}">

                                    <div class="modal-body">

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Slider Title</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->title }}" name="title" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Slider SubTitle</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text"
                                                    value="{{ $edit->sub_title }}" name="sub_title" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Description</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <textarea name="descp" class="form-control" id="" cols="5" rows="5">{{ $edit->descp }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Link Url</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input autocomplete="off" required type="text"
                                                    value="{{ $edit->url }}" name="url" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Image</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="file" id="image" autocomplete="off" name="image"
                                                    class="mb-1 form-control @error('image') is-invalid @enderror" />

                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                                <img src="{{ asset($edit->image) }}" alt="Banner" id="showImage"
                                                    class="mt-1" width="100">

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="rounded-0 btn btn-dark px-3"
                                                    value="Update Slider" />
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
