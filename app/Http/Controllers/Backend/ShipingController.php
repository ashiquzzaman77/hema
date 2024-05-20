<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Illuminate\Http\Request;

class ShipingController extends Controller
{
    //All Division
    public function AllDivision()
    {
        $division = Division::orderBy('division_name', 'ASC')->latest()->get();
        return view('admin.backend.shipping.division.all_division', compact('division'));
    }

    //Store Division
    public function StoreDivision(Request $request)
    {
        Division::insert([

            'division_name' => $request->division_name,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Division Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.division')->with($notification);

    }

    //Edit Division
    public function EditDivision($id)
    {
        $editdivision = Division::find($id);
        return view('admin.backend.shipping.division.edit_division', compact('editdivision'));
    }

    //Update Division
    public function UpdateDivision(Request $request)
    {
        $uid = $request->id;

        Division::find($uid)->update([

            'division_name' => $request->division_name,

        ]);

        $notification = array(
            'message' => 'Division Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.division')->with($notification);

    }

    //Delete Division
    public function DeleteDivision($id)
    {
        Division::find($id)->delete();

        $notification = array(
            'message' => 'Division Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.division')->with($notification);
    }

    ////////////////// District ///////////////////////

    //All District
    public function AllDistrict()
    {
        $district = District::orderBy('district_name', 'ASC')->latest()->get();
        return view('admin.backend.shipping.district.all_district', compact('district'));
    }

    //Store District
    public function StoreDistrict(Request $request)
    {

        $validateData = $request->validate(
            [
                'division_id' => 'required',
            ],
        );

        District::insert([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'District Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.district')->with($notification);

    }

    //Edit District
    public function EditDistrict($id)
    {
        $editdistrict = District::find($id);
        $divisions = Division::latest()->get();

        return view('admin.backend.shipping.district.edit_district', compact('editdistrict','divisions'));
    }

    //Update District
    public function UpdateDistrict(Request $request)
    {
        $uid = $request->id;

        District::find($uid)->update([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);

        $notification = array(
            'message' => 'District Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.district')->with($notification);

    }

    //Delete District
    public function DeleteDistrict($id)
    {
        District::find($id)->delete();

        $notification = array(
            'message' => 'District Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.district')->with($notification);
    }

    ////////////// State //////////////////

    //All State
    public function AllState()
    {
        $state = State::orderBy('state_name', 'ASC')->latest()->get();
        return view('admin.backend.shipping.state.all_state', compact('state'));
    }

    //Store State
    public function StoreState(Request $request)
    {

        $validateData = $request->validate(
            [
                'division_id' => 'required',
            ],
        );

        State::insert([

            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'State Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.state')->with($notification);

    }

    //Edit State
    public function EditState($id)
    {
        $editstate = State::find($id);
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();

        return view('admin.backend.shipping.state.edit_state', compact('editstate','divisions','districts'));
    }

    //Update State
    public function UpdateState(Request $request)
    {
        $uid = $request->id;

        State::find($uid)->update([

            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
        ]);

        $notification = array(
            'message' => 'State Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.state')->with($notification);

    }

    //Delete State
    public function DeleteState($id)
    {
        State::find($id)->delete();

        $notification = array(
            'message' => 'District Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.state')->with($notification);
    }

    //GetDistrict

    public function GetDistrict($division_id)
    {

        $district = District::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();

        return json_encode($district);
    }
}
