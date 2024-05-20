<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BrandController extends Controller
{
    //All Brand
    public function AllBrand()
    {
        $alldata = Brand::latest()->get();
        return view('admin.backend.brand.all_brand', compact('alldata'));
    }

    //Add Brand
    public function AddBrand()
    {
        return view('admin.backend.brand.add_brand');
    }

    //Store Brand
    public function StoreBrand(Request $request)
    {

        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        if ($request->file('image')) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();

            $img = $manager->read($request->file('image'));
            $img = $img->resize(500, 500);

            $img->toJpeg(80)->save(base_path('public/upload/brand/' . $name_gen));
            $save_url = 'upload/brand/' . $name_gen;

            Brand::insert([

                'brand_name' => $request->brand_name,
                'image' => $save_url,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.brand')->with($notification);

        }

    }

    //Edit Brand
    public function EditBrand($id)
    {
        $edit = Brand::find($id);
        return view('admin.backend.brand.edit_brand', compact('edit'));
    }

    //Update Brand
    public function UpdateBrand(Request $request)
    {

        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();

            $img = $manager->read($request->file('image'));
            $img = $img->resize(500, 500);

            $img->toJpeg(80)->save(base_path('public/upload/brand/' . $name_gen));
            $save_url = 'upload/brand/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Brand::find($id)->update([

                'brand_name' => $request->brand_name,
                'image' => $save_url,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'Brand Updated With Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.brand')->with($notification);

        } else {

            Brand::find($id)->update([

                'brand_name' => $request->brand_name,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'Brand Updated Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.brand')->with($notification);

        }

    }

    //Delete Brand
    public function DeleteBrand($id)
    {
        $img = Brand::find($id);
        $delimg = $img->image;
        unlink($delimg);

        Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand Delete Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.brand')->with($notification);
    }
}
