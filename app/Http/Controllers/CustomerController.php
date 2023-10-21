<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
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

    public function login()
    {
        return view('Login.login');
    }

    public function showAdminSite(Customer $customer){
        return view('admin.customer.info',[
            'customer' => $customer,
        ]);
    }

    public function check_login(Request $request){
        $customers = Customer::all();
        $count = Customer::all() -> count();
        if($count == 0){
            $error_login_null = 'tan dang nhap khong ton tai!!!';
            return view('login.login',[
                'error_login_null' => $error_login_null,
            ]);
        }else{
            foreach($customers as $customer){
            if($customer -> customer_username == $request -> user_name){
                if($customer -> customer_username == $request -> user_name && $customer -> customer_password == $request -> password){
                    return redirect()->route('index'); 
                }else{
                    $error_login = 'tan dang nhap hoac mat khau khong dung!!!';
                    return view('login.login',[
                        'error_login' => $error_login,
                    ]);
                } 
            }else{
                $error_username = 'tan dang nhap khong ton tai!!!';
                    return view('login.login',[
                        'error_username' => $error_username,
                    ]);
            }
        }
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
            $password = $request->password;
            $re_password = $request->re_password;

            $array = [];
            $array = Arr::add($array, 'customer_name', $request->full_name);
            $array = Arr::add($array, 'customer_email', $request->cus_email);
            $array = Arr::add($array, 'customer_phonenumber', $request->cus_phonenumber);
            $array = Arr::add($array, 'customer_address', $request->cus_address);
            $array = Arr::add($array, 'customer_username', $request->user_name);
            if($password == $re_password){
                $array = Arr::add($array, 'customer_password', $password);
            }else{
                $error_re_pass = 'Mat khau khong trung khop!!!';
                return view('login.register',[
                    'error_re_pass' => $error_re_pass,
                ]);
            }
            $array = Arr::add($array, 'customer_avatar', 'avatar_default.jpg');
            $array = Arr::add($array, 'customer_date_of_birth', $request->date_of_birth);

            Customer::create($array);

            return redirect()->route('login.login'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $user = Customer::find(1);

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
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $user = Customer::find(1);

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

        if($request->has('cus_name')){
            $password = $request->cus_password;
            $re_password = $request->cus_repass;
            $cus_img = $user->customer_avatar;

            $array = [];
            $array = Arr::add($array, 'customer_name', $request->cus_name);
            $array = Arr::add($array, 'customer_email', $request->cus_email);
            $array = Arr::add($array, 'customer_phonenumber', $request->cus_phone);
            $array = Arr::add($array, 'customer_address', $request->cus_address);
            $array = Arr::add($array, 'customer_username', $request->cus_username);
            if($password == $re_password){
                $array = Arr::add($array, 'customer_password', $password);
            }else{
                return redirect()->route('users');
            }
            $array = Arr::add($array, 'customer_date_of_birth', $request->cus_dateOfBirth);
            $array = Arr::add($array, 'customer_avatar', $cus_img);

            $user->update($array);
        }
        

        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete(); 
        return redirect()->route('admin.customers.index');
    }
}
