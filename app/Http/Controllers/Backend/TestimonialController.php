<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TestimonialController extends Controller
{
    //AllTestimonial
    public function AllTestimonial()
    {
        $alldata = Testimonial::latest()->get();
        return view('admin.backend.testimonial.all_testimonial', compact('alldata'));
    }

    //AddTestimonial
    public function AddTestimonial()
    {
        return view('admin.backend.testimonial.add_testimonial');
    }

    //StoreTestimonial
    public function StoreTestimonial(Request $request)
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
            $img = $img->resize(300, 300);

            $img->toJpeg(80)->save(base_path('public/upload/testimonial/' . $name_gen));
            $save_url = 'upload/testimonial/' . $name_gen;

            Testimonial::insert([

                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'image' => $save_url,
                'created_at' => now(),

            ]);

            $notification = array(
                'message' => 'Testimonial Inserted Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.testimonial')->with($notification);

        }

    }

    //EditTestimonial
    public function EditTestimonial($id)
    {
        $edit = Testimonial::find($id);
        return view('admin.backend.testimonial.edit_testimonial', compact('edit'));
    }

    //UpdateTestimonial
    public function UpdateTestimonial(Request $request)
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
            $img = $img->resize(300, 300);

            $img->toJpeg(80)->save(base_path('public/upload/category/' . $name_gen));
            $save_url = 'upload/category/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Testimonial::find($id)->update([

                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Testimonial Updated With Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.testimonial')->with($notification);

        } else {

            Testimonial::find($id)->update([

                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,

            ]);

            $notification = array(
                'message' => 'Testimonial Updated Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.testimonial')->with($notification);

        }

    }

    //DeleteTestimonial
    public function DeleteTestimonial($id)
    {
        $img = Testimonial::find($id);
        $delimg = $img->image;
        unlink($delimg);

        Testimonial::find($id)->delete();

        $notification = array(
            'message' => 'Testimonial Delete Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.testimonial')->with($notification);
    }
}
