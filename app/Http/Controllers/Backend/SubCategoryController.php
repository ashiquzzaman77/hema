<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SubCategoryController extends Controller
{
    //AllSubCategory
    public function AllSubCategory()
    {
        $alldata = SubCategory::latest()->get();
        return view('admin.backend.subcategory.all_subcategory', compact('alldata'));
    }

    //AddSubCategory
    public function AddSubCategory()
    {
        $categorys = Category::orderBy('category_name','ASC')->get();
        return view('admin.backend.subcategory.add_subcategory',compact('categorys'));
    }

    //Store SubCategory
    public function StoreSubCategory(Request $request)
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
            $img = $img->resize(800, 800);

            $img->toJpeg(80)->save(base_path('public/upload/subcategory/' . $name_gen));
            $save_url = 'upload/subcategory/' . $name_gen;

            SubCategory::insert([

                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),
                'image' => $save_url,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'SubCategory Inserted Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.subcategory')->with($notification);

        }

    }

    //EditSubCategory
    public function EditSubCategory($id)
    {
        $edit = SubCategory::find($id);
        $categorys = Category::orderBy('category_name','ASC')->get();
        
        return view('admin.backend.subcategory.edit_subcategory', compact('edit','categorys'));
    }

    //UpdateSubCategory
    public function UpdateSubCategory(Request $request)
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
            $img = $img->resize(800, 800);

            $img->toJpeg(80)->save(base_path('public/upload/subcategory/' . $name_gen));
            $save_url = 'upload/subcategory/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            SubCategory::find($id)->update([

                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'SubCategory Updated With Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.subcategory')->with($notification);

        } else {

            SubCategory::find($id)->update([

                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),

            ]);

            $notification = array(
                'message' => 'SubCategory Updated Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.subcategory')->with($notification);

        }

    }

    //DeleteSubCategory
    public function DeleteSubCategory($id)
    {
        $img = SubCategory::find($id);
        $delimg = $img->image;
        unlink($delimg);

        SubCategory::find($id)->delete();

        $notification = array(
            'message' => 'SubCategory Delete Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
}
