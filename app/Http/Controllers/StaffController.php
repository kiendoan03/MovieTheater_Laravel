<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use Illuminate\Support\Arr;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $staffs = Staff::all();
            $admin = Auth::guard('staff')->user();
            return view('admin.staff.main',[
                'staffs' => $staffs,
                'admin' => $admin,
            ]);
       
        // return view('admin.staff.main',[
        //     'staffs' => $staffs,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $admin = Auth::guard('staff')->user();

        return view('admin.staff.create',[
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        //
    }

    public function register(StoreStaffRequest $request){

        if ($request->staff_password !== $request->staff_re_psw) {
            return redirect()->back()->withErrors(['password' => 'Mật khẩu không khớp.'])->withInput();
        }
            $staff_img = $request->file('staff_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/staff/'.$staff_img)){
                Storage::putFileAs('public/img/staff/', $request->file('staff_img'), $staff_img);
            }
        // dd($request->staff_full_name);
            $staff = Staff::create([
            'name' => $request->staff_full_name,
            'staff_username' => $request->staff_username,
            'staff_email' => $request->staff_email,
            'password' => Hash::make($request->staff_password),
            'staff_address' => $request->staff_address,
            'staff_date_of_birth' => $request->staff_dob,
            'staff_phonenumber' => $request->staff_phonenumber,
            'staff_avatar' => $staff_img,
            'staff_role' => $request->staff_role,

        ]);
            
        return redirect()->route('admin.staffs.index')->with('success', 'Add staff successfully!'); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    public function showLoginForm(){
        if(Auth::guard('staff')->check()){
             $admin = Auth::guard('staff')->user();
            return redirect()->route('admin.dashboard',[
                'admin' => $admin,
            ]);
        }
       
        return view('admin.staff.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username_or_email', 'password');
        
        if (Auth::guard('staff')->attempt(['staff_username' => $credentials['username_or_email'], 'password' => $credentials['password']]) ||
            Auth::guard('staff')->attempt(['staff_email' => $credentials['username_or_email'], 'password' => $credentials['password']])) {
            return redirect()->route('admin.staffs.index')->with('success', 'Login successfully!');
        } else {
            
            return redirect()->back()->withErrors(['login' => 'Tên người dùng hoặc mật khẩu không chính xác.'])->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('staff')->logout();
        return redirect()->route('admin.staffs.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
        $admin = Auth::guard('staff')->user();
        return view('admin.staff.edit',[
            'staff' => $staff,
            'admin' => $admin,
        ])->with('success', 'Edit staff successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
         if($request->hasFile('staff_img')){
            $staff_img = $request->file('staff_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/staff/'.$staff_img)){
                Storage::putFileAs('public/img/staff/', $request->file('staff_img'), $staff_img);
            }
        }else{
            $staff_img = $staff->staff_avatar;
        }
        
        if($request-> staff_pssw != null){
            $password = $request->staff_pssw;
            $re_password = $request->staff_re_pssw;
            if($password == $re_password){
                $password = $request->staff_pssw;
            }else{
               return redirect()->route('admin.staffs.update', $staff);
            }
             $staff->update([
            'name' => $request -> staff_full_name,
            'staff_email' => $request -> staff_email,
            'staff_phonenumber' => $request -> staff_phonenumber,
            'staff_address' => $request -> staff_address,
            'staff_username' => $request -> staff_username,
            'password' => Hash::make($password),
            'staff_date_of_birth' => $request -> staff_dob,
            'staff_avatar' => $staff_img,
            'staff_role' => $request->staff_role,
            ]);
        }else{
            $password = $staff->password;
            $staff->update([
                'name' => $request -> staff_full_name,
                'staff_email' => $request -> staff_email,
                'staff_phonenumber' => $request -> staff_phonenumber,
                'staff_address' => $request -> staff_address,
                'staff_username' => $request -> staff_username,
                'password' => $password,
                'staff_date_of_birth' => $request -> staff_dob,
                'staff_avatar' => $staff_img,
                'staff_role' => $request->staff_role,
            ]);
        }
        return redirect()->route('admin.staffs.index')->with('success', 'Edit staff successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
        $staff->delete();

        return redirect()->route('admin.staffs.index')->with('success', 'Delete staff successfully!'); 
    }
    
}
