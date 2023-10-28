<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\seat_type;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\schedule_seat;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $schedulesInfo = Schedule::join('movies', 'movies.id', '=', 'schedules.movie_id')
        ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
        ->get(['movies.*', 'schedules.*','schedules.id as schedule_id', 'rooms.*']);

        $admin = Auth::guard('staff')->user();

        return view('Admin.schedule.main',[
            'schedulesInfo' => $schedulesInfo,
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $admin = Auth::guard('staff')->user();

        $schedules = Schedule::all();
        $movies = Movie::all();  
        $rooms = Room::all();
        return view('Admin.schedule.create',[
            'schedules' => $schedules,
            'movies' => $movies,
            'rooms' => $rooms,
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        $data = Schedule::all()
        -> where('date', $request-> date)
        -> where('room_id', $request->room_id);
        
        $length_movie = Movie::where('id', $request->movie_id)->get(['length']);

        $start_time_h = Carbon::parse($request->start_time)->format('H');
        $start_time_m = Carbon::parse($request->start_time)->format('i');

        $start_time = $start_time_h * 60 + $start_time_m;
        
        $end_times = $start_time + $length_movie[0]->length + 30;

        $end_time_h = (int)($end_times / 60);

        $end_time_m = (int)$end_times % 60;

        $end_time = $end_time_h . ':' . $end_time_m;
        
        foreach($data as $srm){
            if($request->start_time >= $srm->start_time && $request->start_time <= $srm->end_time){
                return redirect()->route('admin.schedules.create') -> with('error', 'The time is not available');
            }
            else if($request->start_time <= $srm->start_time && $end_time >= $srm->end_time){
                return redirect()->route('admin.schedules.create')-> with('error', 'The time is not available');
            }
            else if($end_time >= $srm->start_time && $end_time <= $srm->end_time){
                return redirect()->route('admin.schedules.create')-> with('error', 'The time is not available');
            }   
        }


        $array = [];
        $array = Arr::add($array, 'date', $request->date);
        $array = Arr::add($array, 'start_time', $request->start_time);
        $array = Arr::add($array, 'end_time', $end_time);
        $array = Arr::add($array, 'movie_id', $request->movie_id);
        $array = Arr::add($array, 'room_id', $request->room_id);

        Schedule::create($array);
       
        $schedule = Schedule::latest('id')->first();
        $schedule_id = $schedule -> id;

        $seat = Seat::where('room_id', $request->room_id)->get();

        foreach($seat as $s){
            $seat_schedule = [];
            $seat_schedule = Arr::add($seat_schedule, 'schedule_id', $schedule_id);
            $seat_schedule = Arr::add($seat_schedule, 'seat_id', $s->id);
            $seat_schedule = Arr::add($seat_schedule, 'status', $s -> status);
             
            $count_schedule_seat = schedule_seat::where('schedule_id', $schedule_id)->where('seat_id', $s->id)->count();
            if($count_schedule_seat == 0){
               schedule_seat::create($seat_schedule); 
            }else{
                return redirect()->route('admin.schedules.create')-> with('error', 'Error');
            }
            
        }

        return redirect()->route('admin.schedules.index')->with('success', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
        $type = seat_type::all();

        $seats = schedule_seat::join('seats', 'seats.id', '=', 'schedule_seats.seat_id')
        ->join('seat_types', 'seat_types.id', '=', 'seats.type_id')
        ->join('schedules', 'schedules.id', '=', 'schedule_seats.schedule_id')
        ->where('schedule_seats.schedule_id', '=', $schedule -> id)
        ->get(['schedule_seats.*', 'seats.*', 'seat_types.*', 'schedules.*','schedule_seats.status as schedule_seat_status', 'seats.id as seat_id' ,'schedules.id as schedule_id']);

        $room = Room::join('schedules', 'schedules.room_id', '=', 'rooms.id')
        ->where('schedules.id','=', $schedule->id)
        ->get(['rooms.*', 'schedules.*']);

        $admin = Auth::guard('staff')->user();

        return view('admin.schedule.info',[
            'seats' => $seats,
            'type' => $type,
            'schedule' => $schedule,
            'room' => $room,
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $movies = Movie::all();  
        $rooms = Room::all();

        $schedulesInfo = Schedule::join('movies', 'movies.id', '=', 'schedules.movie_id')
        ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
        ->where('schedules.id','=', $schedule->id)
        ->get(['movies.*', 'schedules.*','schedules.id as schedule_id', 'rooms.*']);
        
        $admin = Auth::guard('staff')->user();

        return view('Admin.schedule.edit',[
            
            'movies' => $movies,
            'rooms' => $rooms,
            'schedulesInfo' => $schedulesInfo,
            'admin' => $admin,

        ])->with('success', 'Updated successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
        $data = Schedule::all()
        -> where('id', '!=', $schedule -> id)
        -> where('date', $request-> date)
        -> where('room_id', $request->room_id);

        $length_movie = Movie::where('id', $request->movie_id)->get(['length']);

        $start_time_h = Carbon::parse($request->start_time)->format('H');
        $start_time_m = Carbon::parse($request->start_time)->format('i');

        $start_time = $start_time_h * 60 + $start_time_m;
        
        $end_times = $start_time + $length_movie[0]->length + 30;

        $end_time_h = (int)($end_times / 60);

        $end_time_m = (int)$end_times % 60;

        $end_time = $end_time_h . ':' . $end_time_m;
        
        foreach($data as $srm){
            if($request->start_time >= $srm->start_time && $request->start_time <= $srm->end_time){
                return redirect()->route('admin.schedules.edit',$schedule -> id) -> with('error', 'The time is not available');
            }
            else if($request->start_time <= $srm->start_time && $end_time >= $srm->end_time){
                return redirect()->route('admin.schedules.edit',$schedule -> id)-> with('error', 'The time is not available');
            }
            else if($end_time >= $srm->start_time && $end_time <= $srm->end_time){
                return redirect()->route('admin.schedules.edit',$schedule -> id)-> with('error', 'The time is not available');
            }
        }

        $array = [];
        $array = Arr::add($array, 'date', $request->date);
        $array = Arr::add($array, 'start_time', $request->start_time);
        $array = Arr::add($array, 'end_time', $end_time);
        $array = Arr::add($array, 'movie_id', $request->movie_id);
        $array = Arr::add($array, 'room_id', $request->room_id);

        $schedule -> update($array);

        return redirect()->route('admin.schedules.index')->with('success', 'Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
        
        $seat = schedule_seat::where('schedule_id', '=', $schedule -> id);
       
        $schedule->delete();
        $seat -> delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Deleted successfully');
    }

    public function undonScheduleBook($schedule_id){
        $user = Auth::guard('customers')->user();
        $seats = schedule_seat::where('schedule_id', '=', $schedule_id)->where('status','=','2')->where('customer_id','=',$user -> id)->get();
        foreach($seats as $seat){
            $array = [];
            $array = Arr::add($array, 'status', 0);
            $array = Arr::add($array, 'customer_id', null);
            schedule_seat::where('seat_id', '=', $seat->seat_id)->where('schedule_id','=', $schedule_id) -> update($array);
        }
        return redirect()->route('order',['schedule' => $schedule_id,])->with('success', 'Undone successfully');

    }

    public function showSchedule($schedule){
             $seats = schedule_seat::join('seats', 'seats.id', '=', 'schedule_seats.seat_id')
            ->join('seat_types', 'seat_types.id', '=', 'seats.type_id')
            ->join('schedules', 'schedules.id', '=', 'schedule_seats.schedule_id')
            ->where('schedule_seats.schedule_id', '=', $schedule)
            ->get(['schedule_seats.*', 'seats.*', 'seat_types.*', 'schedules.*','schedule_seats.status as schedule_seat_status', 'seats.id as seat_id' ,'schedules.id as schedule_id']);
        
            
            $schedule = Schedule::join('movies', 'movies.id', '=', 'schedules.movie_id')
            ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
            ->where('schedules.id','=', $schedule)
            ->get(['movies.*', 'schedules.*','schedules.id as schedule_id', 'rooms.*', 'movies.id as movie_id']);

            $user = Auth::guard('customers')->user();

            $total_price = 0;
            foreach($seats as $price){
                if($price -> schedule_seat_status == 2 && $price -> customer_id == $user -> id){
                     $total_price += $price -> price;
                }
            }
            if(Auth::guard('customers')->check()){
                $user = Auth::guard('customers')->user();
                return view('Customer.orderTickets',[
                    'seats' => $seats,
                    'schedule' => $schedule,
                    'total_price' => $total_price,
                    'user' => $user,
                ]);
            }else{
                return view('Customer.orderTickets',[
                    'seats' => $seats,
                    'schedule' => $schedule,
                    'total_price' => $total_price,
                ]);
            }
            
            
       
       
    }

    public function orderTicket($seat_id, $schedule_id ){
            $type = Seat_type::all();
            $seats = Seat::all();
            $seat = schedule_seat::where('seat_id','=',$seat_id)
            ->where('schedule_id','=',$schedule_id)
            ->get();
            $user = Auth::guard('customers')->user();

            foreach($seat as $seat){
                if($seat -> customer_id == null || $seat -> customer_id == $user -> id){
                    if($seat -> status == 0){
                        $array = [];
                        $array = Arr::add($array, 'status', 2);
                        $array = Arr::add($array, 'customer_id', $user -> id);
                        schedule_seat::where('seat_id', '=', $seat_id)->where('schedule_id','=', $schedule_id) -> update($array);
                    }elseif($seat -> status == 2){
                        $array = [];
                        $array = Arr::add($array, 'status', 0);
                        $array = Arr::add($array, 'customer_id', null);
                        schedule_seat::where('seat_id', '=', $seat_id)->where('schedule_id','=', $schedule_id) -> update($array);
                    }
                }else{
                    return redirect()->route('order',['schedule' => $schedule_id,])->with('error', 'This seat is already booked');
                }
                
            }

            return redirect()->route('order',[
                'schedule' => $schedule_id,
                'seats' => $seats,
                'type' => $type,
                'user' => $user,
            ]);
       
    }

    public function bookTicket($schedule_id){

        $seats = schedule_seat::join('seats', 'seats.id', '=', 'schedule_seats.seat_id')
        ->join('seat_types', 'seat_types.id', '=', 'seats.type_id')
        ->where('schedule_seats.schedule_id', '=', $schedule_id)
        ->where('schedule_seats.status', '=', 2)
        ->where('schedule_seats.customer_id', '=', Auth::guard('customers')->user()->id)
        ->get(['schedule_seats.*', 'seats.*', 'seat_types.*', 'schedule_seats.status as schedule_seat_status', 'seats.id as seat_id']);

        $final_price = 0;

        foreach($seats as $seat){
            $final_price = $seat -> price;
            $schedule_seat_id = schedule_seat::where('schedule_id', '=', $schedule_id)->where('seat_id', '=', $seat->seat_id)->get(['id']);
            foreach($schedule_seat_id as $schedule_seat_id){
                 $count = Ticket::where('schedule_seat_id','=', $schedule_seat_id -> id)->count();
            if($count == 0){
                // $schedule_seat_id = schedule_seat::where('schedule_id', '=', $schedule_id)->where('seat_id', '=', $seat->seat_id)->get(['id']);
                $array = [];
            // $array = Arr::add($array, 'schedule_id', $schedule_id);
            // $array = Arr::add($array, 'seat_id', $seat -> seat_id);
            $array = Arr::add($array, 'schedule_seat_id', $schedule_seat_id->id);
            $array = Arr::add($array, 'final_price', $final_price);
            if(Auth::guard('customers')->check()){
                $user = Auth::guard('customers')->user(); 
                $array = Arr::add($array, 'customer_id', $user -> id);
            }else{
                $user = null;
            }
            Ticket::create($array);
            
            $user = Auth::guard('customers')->user(); 

            $arr = [];
            $arr = Arr::add($arr, 'status', 3);
            $arr = Arr::add($arr, 'customer_id', $user -> id);
            schedule_seat::where('seat_id', '=', $seat->seat_id)->where('schedule_id','=', $schedule_id) -> update($arr);
        }else{
            return redirect()->route('order',['schedule' => $schedule_id,])->with('error', 'This seat is already booked');
        }
            }
           
        }
            $user = Auth::guard('customers')->user();
          
        // return redirect()->route('qrcode',[
        //     'schedule' => $schedule_id,
        //     'user' => $user -> id,
        // ])->with('success', 'Booked successfully');
        return redirect()->route('email',[
            'schedule' => $schedule_id,
            'user' => $user ,
        ])->with('success', 'Booked successfully');
        // return redirect()->route('order',['schedule' => $schedule_id,])->with('success', 'Booked successfully');
    }

    public function vnpay(){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";//link sau khi thanh toan thanh cong
        $vnp_TmnCode = "5WX1UF5V";//Mã website tại VNPAY 
        $vnp_HashSecret = "RHEUKIPURAKFHXVNQMUSJKZNQBBMSPWY"; //Chuỗi bí mật

        $vnp_TxnRef = '2'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = '3'; //thong tin don hang
        $vnp_OrderType = 'billpayment' ; 
        $vnp_Amount = 20000 * 100; //so tien don hang
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = '2-2-2020 00:00:00';
       
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate"=>$vnp_ExpireDate,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }
}
