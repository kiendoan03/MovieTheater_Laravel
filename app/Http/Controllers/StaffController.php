<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use Illuminate\Support\Arr;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staffs = Staff::all();

        return view('admin.staff.main',[
            'staffs' => $staffs,
        ]);
        return view('admin.staff.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        //
        if($request -> validated()){
            $password = $request->staff_password;
            $re_password = $request->staff_re_psw;

            $staff_img = $request->file('staff_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/staff/'.$staff_img)){
                Storage::putFileAs('public/img/staff/', $request->file('staff_img'), $staff_img);
            }

            $array = [];
            $array = Arr::add($array, 'staff_name', $request->staff_full_name);
            $array = Arr::add($array, 'staff_email', $request->staff_email);
            $array = Arr::add($array, 'staff_phonenumber', $request->staff_phonenumber);
            $array = Arr::add($array, 'staff_address', $request->staff_address);
            $array = Arr::add($array, 'staff_username', $request->staff_username);
            if($password == $re_password){
                $array = Arr::add($array, 'password', $password);
            }else{
                $error_re_pass = 'Mat khau khong trung khop!!!';
                    return view('admin.staff.create',[
                        'error_re_pass' => $error_re_pass,
                    ]);
            }
            $array = Arr::add($array, 'staff_avatar', $staff_img);
            $array = Arr::add($array, 'staff_date_of_birth', $request->staff_dob);
            $array = Arr::add($array, 'staff_role', $request->staff_role);

            Staff::create($array);

            return redirect()->route('admin.staffs.index'); 
        }else{
            return redirect()->back();
        }
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
        return view('admin.staff.edit',[
            'staff' => $staff,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        //
        if($request->hasFile('staff_img')){
            $staff_img = $request->file('staff_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/staff/'.$staff_img)){
                Storage::putFileAs('public/img/staff/', $request->file('staff_img'), $staff_img);
            }
        }else{
            $staff_img = $staff->staff_avatar;
        }

        $password = $request->staff_pssw;
        $re_password = $request->staff_re_pssw;

        $array = [];
        $array = Arr::add($array, 'staff_name', $request->staff_full_name);
        $array = Arr::add($array, 'staff_email', $request->staff_email);
        $array = Arr::add($array, 'staff_phonenumber', $request->staff_phonenumber);
        $array = Arr::add($array, 'staff_address', $request->staff_address);
        $array = Arr::add($array, 'staff_username', $request->staff_username);
         if($password == $re_password){
            $array = Arr::add($array, 'password', $password);
        }else{
            return redirect()->route('admin.staffs.update', $staff);
        }
        $array = Arr::add($array, 'staff_avatar', $staff_img);
        $array = Arr::add($array, 'staff_date_of_birth', $request->staff_dob);
        $array = Arr::add($array, 'staff_role', $request->staff_role);

        $staff->update($array);

        return redirect()->route('admin.staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
        $staff->delete();

        return redirect()->route('admin.staffs.index'); 
    }
}
