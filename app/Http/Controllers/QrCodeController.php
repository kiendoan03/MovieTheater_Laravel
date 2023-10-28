<?php
namespace App\Http\Controllers;

use App\Models\schedule_seat;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function index($schedule,$user)
    {
      $schedule_seat_id = schedule_seat::where('schedule_id', '=', $schedule)->where('customer_id', '=', $user)->get(['id']);
      foreach($schedule_seat_id as $schedule_seat_id){

           $info_ticket = Ticket::join('schedule_seats','tickets.schedule_seat_id','=','schedule_seats.id')
           ->join('schedules','schedule_seats.schedule_id','=','schedules.id')
            ->join('movies','schedules.movie_id','=','movies.id')
            ->join('rooms','schedules.room_id','=','rooms.id')
            ->join('seats','schedule_seats.seat_id','=','seats.id')
            ->join('customers','tickets.customer_id','=','customers.id')
            ->where('tickets.customer_id','=',$user)
            ->where('schedules.id','=',$schedule)
            ->get(['tickets.final_price','movies.movie_name','rooms.room_name','seats.number','customers.name as cus_name','tickets.created_at','schedules.date','schedules.start_time','schedules.end_time']);
            $user = Auth::guard('customers')->user();  
      // return view('Customer/qrcode',[
      //   'info_ticket' => $info_ticket,
      //   'user' => $user,
      // ]);
        return redirect()->route('email',[
          'info_ticket' => $info_ticket,
          'user' => $user,
          'schedule' => $schedule,
        ]);
      }
        
    }
}