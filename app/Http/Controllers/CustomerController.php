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

        if(!empty($customers)){
            $error_login_null = 'tan dang nhap khong ton tai!!!';
            return view('login.login',[
                'error_login_null' => $error_login_null,
            ]);
        }else{
            foreach($customers as $customer){
            if($customer -> customer_username == $request -> user_name){
                if($customer -> customer_username == $request -> user_name && $customer -> customer_password == $request -> password){
                    return view('Login.register');
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
        $customers = Customer::all();

        if(!empty($customers)){
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
        }else{
            foreach($customers as $customer){
            if($customer -> customer_username == $request -> user_name){
                $error_username = 'ten dang nhap da ton tai!!!';
                return view('login.register',[
                   'error_username' => $error_username,
                ]);
            }elseif($customer -> customer_email == $request -> cus_email){
                $error_email = 'email da ton tai!!!';
                return view('login.register',[
                   'error_email' => $error_email,
                ]);
            }elseif($customer -> customer_phonenumber == $request -> cus_phonenumber){
                $error_phone = 'so dien thoai da ton tai!!!';
                return view('login.register',[
                   'error_phone' => $error_phone,
                ]);
            }else{
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
         }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        
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
