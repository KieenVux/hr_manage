<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('id', 'asc')->get();
        return view('staff.index', ['staffs' => $staff]);
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $newStaff = $request->validate([
            'name' => 'required',
            'grid' => 'required',
        ]);

        Staff::create(
            $newStaff
        );

        return redirect(route('staff.index'));
    }
    public function edit(Staff $staff)
    {
        return view('staff.edit', ['staff' => $staff]);
    }

    public function update(Staff $staff, Request $request)
    {
        $updateStaff = $request->validate(([
            'name' => 'required',
            'grid' => 'required',
        ]));

        $staff->update($updateStaff);

        return redirect(route('staff.index'))->with('success', 'Staff is update');
    }

    public function delete(Staff $staff)
    {
        $staff->delete();
        return redirect(route('staff.index'));
    }
}
