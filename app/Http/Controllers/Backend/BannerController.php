<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    //All Banner
    public function AllBanner()
    {
        $banner = Banner::latest()->get();
        return view('admin.backend.banner.all_banner', compact('banner'));
    }

    //Edit Banner
    public function EditBanner($id)
    {
        $edit = Banner::find($id);
        return view('admin.backend.banner.edit_banner', compact('edit'));
    }

    //UpdateBanner
    public function UpdateBanner(Request $request)
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

            $img->toJpeg(80)->save(base_path('public/upload/banner/' . $name_gen));
            $save_url = 'upload/banner/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Banner::find($id)->update([

                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'url' => $request->url,
                'descp' => $request->descp,
                'counter' => $request->counter,
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Banner Updated With Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.banner')->with($notification);

        } else {

            Banner::find($id)->update([

                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'url' => $request->url,
                'descp' => $request->descp,
                'counter' => $request->counter,

            ]);

            $notification = array(
                'message' => 'Banner Updated Without Image Successfully',
                'alert-type' => 'info',
            );
            return redirect()->route('all.banner')->with($notification);

        }

    }
}
