<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Smtp;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    //All Smtp
    public function AllSmtp()
    {
        $smtp = Smtp::latest()->get();
        return view('admin.backend.smtp.all_smtp',compact('smtp'));
    }

    //Edit Smtp
    public function EditSmtp($id)
    {
        $edit = Smtp::find($id);
        return view('admin.backend.smtp.edit_smtp',compact('edit'));
    }

    //Update Smtp
    public function UpdateSmtp(Request $request)
    {
        $smtp_id = $request->id;

        Smtp::find($smtp_id)->update([

            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,

        ]);

        $notification = array(
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
