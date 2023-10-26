<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function index($schedule_id,$user)
    {
        $seat = Ticket::where('schedule_id', '=', $schedule_id)->where('customer_id', '=', $user)->get(['seat_id']);

           $info_ticket = Ticket::join('schedules','tickets.schedule_id','=','schedules.id')
            ->join('movies','schedules.movie_id','=','movies.id')
            ->join('rooms','schedules.room_id','=','rooms.id')
            ->join('seats','tickets.seat_id','=','seats.id')
            ->join('customers','tickets.customer_id','=','customers.id')
            ->where('tickets.customer_id','=',$user)
            ->where('tickets.schedule_id','=',$schedule_id)
            ->get(['tickets.final_price','movies.movie_name','rooms.room_name','seats.number','customers.name as cus_name','tickets.created_at','schedules.date','schedules.start_time','schedules.end_time']);
        $user = Auth::guard('customers')->user();    
        
      return view('Customer/qrcode',[
        'info_ticket' => $info_ticket,
        'user' => $user,
      ]);
    }
}