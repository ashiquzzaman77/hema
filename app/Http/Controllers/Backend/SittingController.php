<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sitting;
use Illuminate\Http\Request;

class SittingController extends Controller
{
    //AllSitting
    public function AllSitting()
    {
        $sittings = Sitting::latest()->get();
        return view('admin.backend.sitting.all_sitting',compact('sittings'));
    }

    //EditSitting
    public function EditSitting($id)
    {
        $edit = Sitting::find($id);
        return view('admin.backend.sitting.edit_sitting',compact('edit'));
    }

    //UpdateSitting
    public function UpdateSitting(Request $request)
    {
        $edit = $request->id;
        Sitting::find($edit)->update([

            'email' =>$request->email,
            'phone' =>$request->phone,
            'offer' =>$request->offer,
            'address' =>$request->address,

            'copyright' =>$request->copyright,
            'facebook' =>$request->facebook,
            'twitter' =>$request->twitter,
            'linkdin' =>$request->linkdin,
            'intagram' =>$request->intagram,

        ]);

        $notification = array(
            'message' => 'Sitting Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.sitting')->with($notification);
    }
}
