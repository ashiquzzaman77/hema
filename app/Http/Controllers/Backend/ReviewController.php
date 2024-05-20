<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //All Review
    public function AllReview()
    {
        $review = Review::latest()->get();
        return view('admin.backend.review.all_review',compact('review'));
    }

    //Inactive Review
    public function ReviewInactive($id)
    {
        Review::find($id)->update([

            'status' => 0,

        ]);

        $notification = array(
            'message' => 'Review Inactive Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.review')->with($notification);
    }

    //Active Review
    public function ReviewActive($id)
    {
        Review::find($id)->update([

            'status' => 1,

        ]);

        $notification = array(
            'message' => 'Review Active Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.review')->with($notification);
    }

    //Delete Review
    public function DeleteReview($id)
    {
        Review::find($id)->delete();

        $notification = array(
            'message' => 'Review Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.review')->with($notification);
    }
}
