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
                        <li class="breadcrumb-item active" aria-current="page">Edit SMTP</li>
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

                                <form action="{{ route('update.smtp') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                                    <div class="modal-body">


                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Mailer</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->mailer }}" name="mailer"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Host</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->host }}" name="host"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Port</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->port }}" name="port"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Username</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->username }}" name="username"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->password }}" name="password"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Encryption</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->encryption }}" name="encryption"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">From Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->from_address }}" name="from_address"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="rounded-0 btn btn-dark px-3" value="Update SMTP" />
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

@endsection
