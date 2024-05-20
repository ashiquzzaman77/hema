<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CategoryController extends Controller
{
    //All Category
    public function AllCategory()
    {
        $alldata = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('alldata'));
    }

    //Add Category
    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }

    //Store Category
    public function StoreCategory(Request $request)
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

            $img->toJpeg(80)->save(base_path('public/upload/category/' . $name_gen));
            $save_url = 'upload/category/' . $name_gen;

            Category::insert([

                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                'image' => $save_url,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'Category Inserted Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.category')->with($notification);

        }

    }

    //Edit Category
    public function EditCategory($id)
    {
        $edit = Category::find($id);
        return view('admin.backend.category.edit_category', compact('edit'));
    }

    //Update Category
    public function UpdateCategory(Request $request)
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

            $img->toJpeg(80)->save(base_path('public/upload/category/' . $name_gen));
            $save_url = 'upload/category/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Category::find($id)->update([

                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Category Updated With Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.category')->with($notification);

        } else {

            Category::find($id)->update([

                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace('', '-', $request->category_name)),

            ]);

            $notification = array(
                'message' => 'Category Updated Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.category')->with($notification);

        }

    }

    //Delete Category
    public function DeleteCategory($id)
    {
        $img = Category::find($id);
        $delimg = $img->image;
        unlink($delimg);

        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.category')->with($notification);
    }
}
