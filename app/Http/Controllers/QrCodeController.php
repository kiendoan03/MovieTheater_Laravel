<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function index($schedule_id,$user)
    {
        $seat = Ticket::where('schedule_id', '=', $schedule_id)->where('customer_id', '=', $user)->get(['seat_id']);
        foreach($seat as $seat){
           $info_ticket = Ticket::join('schedules','tickets.schedule_id','=','schedules.id')
            ->join('movies','schedules.movie_id','=','movies.id')
            ->join('rooms','schedules.room_id','=','rooms.id')
            ->join('schedule_seats','schedules.id','=','schedule_seats.schedule_id')
            ->join('seats','schedule_seats.seat_id','=','seats.id')
            ->join('seat_types','seats.type_id','=','seat_types.id')
            ->join('customers','tickets.customer_id','=','customers.id')
            ->where('tickets.seat_id','=',$seat->seat_id)
            ->where('schedules.id','=',$schedule_id)
            ->where('tickets.customer_id','=',$user)
            ->where('schedule_seats.status','=','3')
            ->get(['tickets.final_price','movies.movie_name','movies.poster_img','rooms.room_name','seats.number','seat_types.type','customers.name','tickets.created_at']);
        }
        
         dd($info_ticket);

      return view('Customer/qrcode',compact('schedule_id','user','info_ticket'));
    }
}