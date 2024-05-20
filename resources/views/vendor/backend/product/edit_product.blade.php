@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">


        <h6 class="mb-0 text-uppercase">Edit Product</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('update.vendor.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $editproduct->id }}">
                    <input type="hidden" name="old_image" value="{{ $editproduct->product_image }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>

                                        <input type="text" autocomplete="off" name="product_name"
                                            value="{{ $editproduct->product_name }}" class="form-control" required
                                            placeholder="Enter Product Name">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Color</label>

                                        <input type="text" value="{{ $editproduct->color }}" data-role="tagsinput"
                                            autocomplete="off" name="color" class="form-control">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Size</label>

                                        <input value="{{ $editproduct->size }}" type="text" data-role="tagsinput"
                                            autocomplete="off" name="size" class="form-control">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Short Descp</label>
                                        <textarea class="form-control" name="short_descp" rows="3">{{ $editproduct->short_descp }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Long Descp</label>
                                        <textarea class="form-control" id="myeditorinstance" name="long_descp" rows="3">{!! $editproduct->long_descp !!}</textarea>
                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">Image</label>

                                        <input type="file" id="image" autocomplete="off" name="product_image"
                                            class="mb-1 form-control @error('product_image') is-invalid @enderror" />

                                        @error('product_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <img src="{{ asset($editproduct->product_image) }}" alt="Product" id="showImage"
                                            class="mt-1" width="90" height="90">
                                    </div>



                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">

                                        <div class="col-md-6">

                                            <label class="form-label">Price</label>

                                            <input value="{{ $editproduct->selling_price }}" type="text"
                                                class="form-control" name="selling_price" required autocomplete="off"
                                                placeholder="00.00">

                                        </div>

                                        <div class="col-md-6">

                                            <label class="form-label">Dscount Price</label>

                                            <input value="{{ $editproduct->discount_price }}" type="text"
                                                class="form-control" name="discount_price" autocomplete="off"
                                                placeholder="00.00">

                                        </div>

                                        <div class="col-md-12">

                                            <label class="form-label">Qty</label>

                                            <input value="{{ $editproduct->product_qty }}" type="text"
                                                class="form-control" name="product_qty" autocomplete="off">

                                        </div>

                                        <div class="col-md-12">

                                            <label class="form-label">Counter</label>

                                            <input value="{{ $editproduct->counter }}" type="date" class="form-control"
                                                name="counter" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                                autocomplete="off">

                                        </div>

                                        <div class="col-12">

                                            <label for="inputProductType" class="form-label">Brand Name</label>

                                            <select autocomplete="off" class="form-select" name="brand_id">
                                                <option disabled selected>Select Brand</option>

                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ $editproduct->brand_id == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->brand_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-12">

                                            <label for="inputProductType" class="form-label">Category Name</label>

                                            <select autocomplete="off" class="form-select" name="category_id">
                                                <option disabled selected>Select Category</option>

                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $editproduct->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->category_name }}

                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-12">

                                            <label class="form-label">SubCategory Name</label>

                                            <select class="form-select" name="subcategory_id">

                                                @foreach ($subcategorys as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $editproduct->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->subcategory_name }}

                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>


                                        <div class="col-4">
                                            <div class="form-check">

                                                <input {{ $editproduct->best_seller == 1 ? 'checked' : '' }}
                                                    class="form-check-input" type="checkbox" name="best_seller"
                                                    value="1">

                                                <label class="form-check-label">Best Seller</label>

                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-check">

                                                <input {{ $editproduct->new_arrival == 1 ? 'checked' : '' }}
                                                    class="form-check-input" type="checkbox" name="new_arrival"
                                                    value="1">

                                                <label class="form-check-label">New Arrival</label>

                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-check">

                                                <input {{ $editproduct->top_rated == 1 ? 'checked' : '' }}
                                                    class="form-check-input" type="checkbox" name="top_rated"
                                                    value="1">

                                                <label class="form-check-label">Top Rated</label>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="col-12 mt-4">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-dark rounded-0">Update Product</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>

                </form>
            </div>
        </div>

        {{-- <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Add Multi Image</h6>
                <form action="{{ route('store.new.multiimage') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="imageid" value="{{ $editproduct->id }}">

                    <div class="row">

                        <div class="col-8">
                            <input type="file" required autocomplete="off" class="form-control" name="multi_img">
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>

                </form>
            </div>
        </div> --}}

        {{-- Multi Image Show --}}
        {{-- <div class="card">
            <div class="card-body">
                <h5>Multi Image</h5>
                <hr>

                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Image</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <form action="{{route('update.multiimg')}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            @foreach ($multiimg as $key => $img)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($img->multi_img) }}" style="width: 60px; height: 60p;;"
                                            alt="">
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" name="multi_img[{{ $img->id }}]" autocomplete="off">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-dark">Update
                                            Image</button>

                                        <a href="{{ route('delete.multiimg', $img->id) }}" id="delete"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </form>

                    </tbody>
                </table>
            </div>
        </div> --}}

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

    {{-- multi image  --}}
    {{-- <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script> --}}

    {{-- sub category --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
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
