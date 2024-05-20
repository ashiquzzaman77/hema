<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SliderController extends Controller
{
    //All Slider
    public function AllSlider()
    {
        $slider = Slider::latest()->get();
        return view('admin.backend.slider.all_slider', compact('slider'));
    }

    //Edit Slider
    public function EditSlider($id)
    {
        $edit = Slider::find($id);
        return view('admin.backend.slider.edit_slider', compact('edit'));
    }

    //
    public function UpdateSlider(Request $request)
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
            $img = $img->resize(1920, 795);

            $img->toJpeg(80)->save(base_path('public/upload/slider/' . $name_gen));
            $save_url = 'upload/slider/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Slider::find($id)->update([

                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'descp' => $request->descp,
                'url' => $request->url,
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Slider Updated With Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.slider')->with($notification);

        } else {

            Slider::find($id)->update([

                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'url' => $request->url,

            ]);

            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.slider')->with($notification);

        }

    }

}
