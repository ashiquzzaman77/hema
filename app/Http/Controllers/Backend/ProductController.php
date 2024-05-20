<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    //Update User Status
    public function UpdateUserStatus(Request $request)
    {
        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked', 0);

        $user = Product::find($userId);
        if ($user) {
            $user->status = $isChecked;
            $user->save();
        }

        return response()->json(['message' => 'User Status Updated Successfully']);

    }

    // AAjax in product

    public function GetSubCategory($category_id)
    {

        $subCat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASc')->get();

        return json_encode($subCat);

    }

    //All Product
    public function AllProduct()
    {
        $alldata = Product::latest()->get();
        return view('admin.backend.product.all_product', compact('alldata'));
    }

    //Add Product
    public function AddProduct()
    {
        $categorys = Category::orderBy('category_name', 'ASC')->get();
        $brands = Brand::orderBy('brand_name', 'ASC')->get();

        return view('admin.backend.product.add_product', compact('categorys', 'brands'));
    }

    //Store Product
    public function StoreProduct(Request $request)
    {

        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $code = IdGenerator::generate(['table' => 'products', 'field' => 'code', 'length' => 5, 'prefix' => 'Hema']);

        if ($request->file('product_image')) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('product_image')->getClientOriginalExtension();

            $img = $manager->read($request->file('product_image'));
            $img = $img->resize(620, 820);

            $img->toJpeg(80)->save(base_path('public/upload/product/' . $name_gen));
            $save_url = 'upload/product/' . $name_gen;

            $product_id = Product::insertGetId([

                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('', '-', $request->product_name)),
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'color' => $request->color,
                'size' => $request->size,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,

                'code' => $code,

                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'counter' => $request->counter,
                'product_qty' => $request->product_qty,
                'best_seller' => $request->best_seller,
                'new_arrival' => $request->new_arrival,
                'top_rated' => $request->top_rated,

                'status' => 1,

                'product_image' => $save_url,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'Product Inserted Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.product')->with($notification);

        }

    }

    //Edit Product
    public function EditProduct($id)
    {
        $editproduct = Product::find($id);
        $categorys = Category::orderBy('category_name', 'ASC')->get();
        $brands = Brand::orderBy('brand_name', 'ASC')->get();

        $edit = $editproduct->category_id;
        $subcategorys = SubCategory::where('category_id', $edit)->latest()->get();

        return view('admin.backend.product.edit_product', compact('categorys', 'brands', 'editproduct', 'subcategorys'));
    }

    //Update Product
    public function UpdateProduct(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $id = $request->id;
        $old_img = $request->old_image;

        // $code = IdGenerator::generate(['table' => 'products', 'field' => 'code', 'length' => 5, 'prefix' => 'Hema']);

        if ($request->file('product_image')) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('product_image')->getClientOriginalExtension();

            $img = $manager->read($request->file('product_image'));
            $img = $img->resize(620, 820);

            $img->toJpeg(80)->save(base_path('public/upload/product/' . $name_gen));
            $save_url = 'upload/product/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Product::find($id)->update([

                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('', '-', $request->product_name)),
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'color' => $request->color,
                'size' => $request->size,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,

                // 'code' => $code,

                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'counter' => $request->counter,
                'product_qty' => $request->product_qty,
                'best_seller' => $request->best_seller,
                'new_arrival' => $request->new_arrival,
                'top_rated' => $request->top_rated,

                'status' => 1,

                'product_image' => $save_url,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'Product Update With Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.product')->with($notification);

        } else {

            Product::find($id)->update([

                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('', '-', $request->product_name)),
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'color' => $request->color,
                'size' => $request->size,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,

                // 'code' => $code,

                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'counter' => $request->counter,
                'product_qty' => $request->product_qty,
                'best_seller' => $request->best_seller,
                'new_arrival' => $request->new_arrival,
                'top_rated' => $request->top_rated,

                'status' => 1,

            ]);

            $notification = array(
                'message' => 'Product Update Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.product')->with($notification);

        }
    }

    //Delete Product
    public function DeleteProduct($id)
    {
        $img = Product::find($id);
        $delimg = $img->product_image;
        unlink($delimg);

        Product::find($id)->delete();

        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.product')->with($notification);
    }

    //All Product
    public function AllProductStock()
    {
        $alldata = Product::latest()->get();
        return view('admin.backend.product.all_product_stock', compact('alldata'));
    }
}
