@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">


        <h6 class="mb-0 text-uppercase">Add Product</h6>

        <hr />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.vendor.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>

                                        <input type="text" autocomplete="off" name="product_name" class="form-control"
                                            required placeholder="Enter Product Name">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Color</label>

                                        <input type="text" data-role="tagsinput" autocomplete="off" name="color"
                                            class="form-control">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Size</label>

                                        <input type="text" data-role="tagsinput" autocomplete="off" name="size"
                                            class="form-control">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Short Descp</label>
                                        <textarea class="form-control" name="short_descp" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Long Descp</label>
                                        <textarea class="form-control" id="myeditorinstance" name="long_descp" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">Image</label>

                                        <input type="file" id="image" required autocomplete="off"
                                            name="product_image"
                                            class="mb-1 form-control @error('product_image') is-invalid @enderror" />

                                        @error('product_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <img src="{{ url('upload/no_image.jpg') }}" alt="Product" id="showImage"
                                            class="mt-1" width="90" height="90">
                                    </div>

                                    {{-- <div class="mb-3">

                                        <label class="form-label">Multi Image</label>

                                        <input type="file" autocomplete="off" class="form-control" id="multiImg"
                                            name="multi_img[]" multiple="">

                                        <div class="row mt-3" id="preview_img"></div>

                                    </div> --}}

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">

                                        <div class="col-md-6">

                                            <label class="form-label">Price</label>

                                            <input type="text" class="form-control" name="selling_price" required
                                                autocomplete="off" placeholder="00.00">

                                        </div>

                                        <div class="col-md-6">

                                            <label class="form-label">Discount Price</label>

                                            <input type="text" class="form-control" name="discount_price"
                                                autocomplete="off" placeholder="00.00">

                                        </div>

                                        <div class="col-md-12">

                                            <label class="form-label">Qty</label>

                                            <input type="text" class="form-control" name="product_qty"
                                                autocomplete="off">

                                        </div>

                                        <div class="col-md-12">

                                            <label class="form-label">Counter</label>

                                            <input type="date" class="form-control" name="counter"
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" autocomplete="off">

                                        </div>

                                        <div class="col-12">

                                            <label for="inputProductType" class="form-label">Category Name</label>

                                            <select autocomplete="off" class="form-select" name="brand_id">
                                                <option disabled selected>Select Brand</option>

                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-12">

                                            <label for="inputProductType" class="form-label">Category Name</label>

                                            <select autocomplete="off" class="form-select" name="category_id">
                                                <option disabled selected>Select Category</option>

                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-12 mb-4">

                                            <label class="form-label">SubCategory Name</label>

                                            <select class="form-select" name="subcategory_id">

                                                <option selected disabled>Select SubCategory</option>

                                            </select>

                                        </div>

                                        <div class="col-4">
                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox" name="best_seller"
                                                    value="1">

                                                <label class="form-check-label">Best Seller</label>

                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox" name="new_arrival"
                                                    value="1">

                                                <label class="form-check-label">New Arrival</label>

                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox" name="top_rated"
                                                    value="1">

                                                <label class="form-check-label">Top Rated</label>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="col-12 mt-4">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-dark rounded-0">Save Product</button>
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
