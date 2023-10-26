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
        $admin = Auth::guard('staff')->user();

        return view('admin.customer.main',[
            'customers' => $customers,
            'admin' => $admin,
        ]);
        
    }

    public function showLoginForm()
    {
        if(Auth::guard('customers')->check()){
            $user = Auth::guard('customers')->user();
           return redirect()->route('index',[
               'user' => $user,
           ]);
       }
        return view('Login.login');
    }

    public function showAdminSite(Customer $customer){
        $admin = Auth::guard('staff')->user();
        return view('admin.customer.info',[
            'customer' => $customer,
            'admin' => $admin,
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

    public function register(StoreCustomerRequest $request){
        if ($request->password !== $request->re_password) {
            return redirect()->back()->withErrors(['password' => 'Mật khẩu không khớp.'])->withInput();
        }
            $customer = Customer::create([
            'name' => $request->full_name,    
            'customer_username' => $request->username,
            'customer_email' => $request->cus_email,
            'password' => Hash::make($request->password),
            'customer_address' => $request->cus_address,
            'customer_date_of_birth' => $request->date_of_birth,
            'customer_phonenumber' => $request->cus_phonenumber,
            'customer_avatar' => 'avatar_default.jpg',
            // 'customer_name' => $request->full_name,
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


    public function changeAvt(Request $request, $user){
        $users = Customer::find($user);

        if($request->hasFile('cus_img')){
            $cus_img = $request->file('cus_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/user/'.$cus_img)){
                Storage::putFileAs('public/img/user/', $request->file('cus_img'), $cus_img);
            }
        }else{
            $cus_img = $users->customer_avatar;
        }
        $users -> customer_avatar = $cus_img;
        $users -> save();
        return redirect()->route('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $user)
    {
        //'
        // dd($request->all());
            $users = Customer::find($user);
            $cus_img = $users->customer_avatar;
            
            if($request-> cus_password != null){
                $password = $request->cus_password;
                $re_password = $request->cus_repass;
                if($password == $re_password){
                    $password = $request->cus_password;
                }else{
                    return redirect()->route('user', $user);
                }
                 $users->update([
                'name' => $request -> cus_name,
                'customer_email' => $request -> cus_email,
                'customer_phonenumber' => $request -> cus_phone,
                'customer_address' => $request -> cus_address,
                'customer_username' => $request -> cus_username,
                'password' => Hash::make($password),
                'customer_date_of_birth' => $request -> cus_dateOfBirth,
                'customer_avatar' => $cus_img,
                ]);
            }else{
                $password = $users->password;
                $users->update([
                    'name' => $request -> cus_name,
                    'customer_email' => $request -> cus_email,
                    'customer_phonenumber' => $request -> cus_phone,
                    'customer_address' => $request -> cus_address,
                    'customer_username' => $request -> cus_username,
                    'password' => $password,
                    'customer_date_of_birth' => $request -> cus_dateOfBirth,
                    'customer_avatar' => $cus_img,
                ]);
            }
           
            // $users -> name = $request -> cus_name;
            // $users -> save();
           
        return redirect()->route('user', $user);
    }

    public function resetPassword($customer){
        $users = Customer::find($customer);
        
        $users -> password = Hash::make('123456');
        $users -> save();
        return redirect()->route('admin.customers.show', $customer);
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
