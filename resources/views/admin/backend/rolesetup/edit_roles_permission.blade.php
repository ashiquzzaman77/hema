@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role In Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Role In Permission</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">

                <form action="{{ route('admin.roles.update',$role->id) }}" method="post" class="row g-3" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label"> Roles Name</label>

                        <input type="text" class="form-control text-danger fs-5" readonly value="{{ $role->name }}">
                    </div>

                    <br>


                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" id="checkDefaultmain">

                        <label class="form-check-label" for="flexCheckDefault">Permission All </label>

                    </div>

                    <hr>

                    {{-- All Permission  --}}

                    @foreach ($permission_groups as $group)
                        <div class="row">

                            <div class="col-3">

                                @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                @endphp

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}">

                                    <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>

                                </div>

                                <br>

                            </div>

                            <div class="col-9">

                                @foreach ($permissions as $permission)
                                    <div class="form-check">

                                        <input class="form-check-input" name="permission[]" type="checkbox"
                                            value="{{ $permission->id }}" id="checkDefault{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                                        <label class="form-check-label"
                                            for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                    @endforeach

                    {{-- All Permission  --}}

                    <br>

                    <div class="col-md-12">

                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-dark px-3 rounded-0">Update</button>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {

            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }

        });
    </script>
@endsection
