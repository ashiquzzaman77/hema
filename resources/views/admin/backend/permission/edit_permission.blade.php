@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Permission</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
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

                                <form action="{{ route('update.permission') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $edit->id }}">

                                    <div class="modal-body">

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input required autocomplete="off" type="text" value="{{ $edit->name }}" name="name"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Group Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">

                                                <select required name="group_name" class="form-select mb-3">

                                                    <option selected disabled>Select Group Name</option>

                                                    <option value="Banner" {{ $edit->group_name == 'Banner' ? 'selected' : '' }}>Banner</option>

                                                    <option value="Slider" {{ $edit->group_name == 'Slider' ? 'selected' : '' }}>Slider</option>

                                                    <option value="Category" {{ $edit->group_name == 'Category' ? 'selected' : '' }}>Category</option>

                                                    <option value="SubCategory" {{ $edit->group_name == 'SubCategory' ? 'selected' : '' }}>SubCategory</option>

                                                    <option value="Brand" {{ $edit->group_name == 'Brand' ? 'selected' : '' }}>Brand</option>

                                                    <option value="Testimonial" {{ $edit->group_name == 'Testimonial' ? 'selected' : '' }}>Testimonial</option>

                                                    <option value="Product" {{ $edit->group_name == 'Product' ? 'selected' : '' }}>Product</option>

                                                    <option value="Coupon" {{ $edit->group_name == 'Coupon' ? 'selected' : '' }}>Coupon</option>

                                                    <option value="Shiping" {{ $edit->group_name == 'Shiping' ? 'selected' : '' }}>Shiping</option>

                                                    <option value="Review" {{ $edit->group_name == 'Review' ? 'selected' : '' }}>Review</option>

                                                    <option value="Order" {{ $edit->group_name == 'Order' ? 'selected' : '' }}>Order</option>

                                                    <option value="Sitting" {{ $edit->group_name == 'Sitting' ? 'selected' : '' }}>Sitting</option>

                                                    <option value="Ecommerce" {{ $edit->group_name == 'Ecommerce' ? 'selected' : '' }}>Ecommerce</option>

                                                    <option value="Smtp" {{ $edit->group_name == 'Smtp' ? 'selected' : '' }}>Smtp</option>

                                                    <option value="Stock" {{ $edit->group_name == 'Stock' ? 'selected' : '' }}>Stock</option>

                                                    <option value="Subscribe" {{ $edit->group_name == 'Subscribe' ? 'selected' : '' }}>Subscribe</option>


                                                    <option value="Contact" {{ $edit->group_name == 'Contact' ? 'selected' : '' }}>Contact</option>

                                                    <option value="Client" {{ $edit->group_name == 'Client' ? 'selected' : '' }}>Client</option>

                                                    <option value="Admin" {{ $edit->group_name == 'Admin' ? 'selected' : '' }}>Admin</option>


                                                    <option value="Role and Permission" {{ $edit->group_name == 'Role and Permission' ? 'selected' : '' }}>Role and Permission</option>


                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="rounded-0 btn btn-dark px-3"
                                                    value="Update Permission" />
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
