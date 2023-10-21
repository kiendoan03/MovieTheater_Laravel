<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customer.main',[
            'customers' => $customers,
        ]);
        
    }

    public function showLoginForm()
    {
        return view('Login.login');
    }

    public function showAdminSite(Customer $customer){
        return view('admin.customer.info',[
            'customer' => $customer,
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username_or_email', 'password');
        
        if (Auth::guard('customers')->attempt(['customer_username' => $credentials['username_or_email'], 'password' => $credentials['password']]) ||
            Auth::guard('customers')->attempt(['customer_email' => $credentials['username_or_email'], 'password' => $credentials['password']])) {
            return redirect()->route('index');
        } else {
            
            return redirect()->back()->withErrors(['login' => 'Tên người dùng hoặc mật khẩu không chính xác.'])->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Login.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    public function register(Request $request){
        if ($request->password !== $request->re_password) {
            return redirect()->back()->withErrors(['password' => 'Mật khẩu không khớp.'])->withInput();
        }
        $customer = Customer::create([
            'customer_name' => $request->full_name,
            'customer_username' => $request->user_name,
            'customer_email' => $request->cus_email,
            'password' => Hash::make($request->password),
            'customer_address' => $request->cus_address,
            'customer_date_of_birth' => $request->date_of_birth,
            'customer_phonenumber' => $request->cus_phonenumber,
            'customer_avatar' => 'avatar_default.jpg',
        ]);
        return redirect()->route('login.login'); 
    
    }

 

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer ,$user)
    {
        $user = Customer::find($user);

        return view('Customer.user',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer, $user)
    {
        //'
        $user = Customer::find($user);

        if($request->has('cus_name')){
            $cus_img = $user->customer_avatar;
            
            if($request-> cus_password != null){
                $password = $request->cus_password;
                $re_password = $request->cus_repass;
                if($password == $re_password){
                    $password = $request->cus_password;
                }else{
                    return redirect()->route('users');
                }
            }else{
                $password = $user->password;
            }
            $user->update([
                'customer_name' => $request->cus_name,
                'customer_email' => $request->cus_email,
                'customer_phonenumber' => $request->cus_phone,
                'customer_address' => $request->cus_address,
                'customer_username' => $request->cus_username,
                'password' => Hash::make($password),
                'customer_date_of_birth' => $request->cus_dateOfBirth,
                'customer_avatar' => $cus_img,
            ]);
        }else{
            if($request->hasFile('cus_img')){
                $cus_img = $request->file('cus_img')-> getClientOriginalName();
    
                if(!Storage::exists('public/img/user/'.$cus_img)){
                    Storage::putFileAs('public/img/user/', $request->file('cus_img'), $cus_img);
                }
            }else{
                $cus_img = $user->customer_avatar;
            }
            $user -> customer_avatar = $cus_img;
            $user -> save();
        }

        return redirect()->route('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete(); 
        return redirect()->route('admin.customers.index');
    }

    public function logout()
    {
        Auth::guard('customers')->logout();
        return redirect()->route('index');
    }
}
