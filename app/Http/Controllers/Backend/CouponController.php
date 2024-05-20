<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //All Slider
    public function AllCoupon()
    {
        $coupon = Coupon::latest()->get();
        return view('admin.backend.coupon.all_coupon', compact('coupon'));
    }

    //Add Slider
    public function AddCoupon()
    {
        return view('admin.backend.coupon.add_coupon');
    }

    //Coupon Store
    public function StoreCoupon(Request $request)
    {

        Coupon::insert([

            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'status' => 1,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Coupon Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.coupon')->with($notification);

    }

    //Edit Coupon
    public function EditCoupon($id)
    {
        $editcoupon = Coupon::find($id);
        return view('admin.backend.coupon.edit_coupon', compact('editcoupon'));
    }

    //Update Slider
    public function UpdateCoupon(Request $request)
    {
        $uid = $request->id;

        Coupon::find($uid)->update([

            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'status' => 1,

        ]);

        $notification = array(
            'message' => 'Coupon Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.coupon')->with($notification);
    }

    //Delete Coupon
    public function DeleteCoupon($id)
    {

        Coupon::find($id)->delete();

        $notification = array(
            'message' => 'Coupon Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.coupon')->with($notification);
    }
}
