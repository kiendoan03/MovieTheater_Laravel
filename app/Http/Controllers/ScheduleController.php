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

        return view('Admin.schedule.main',[
            'schedulesInfo' => $schedulesInfo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $schedules = Schedule::all();
        $movies = Movie::all();  
        $rooms = Room::all();
        return view('Admin.schedule.create',[
            'schedules' => $schedules,
            'movies' => $movies,
            'rooms' => $rooms,
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
        
        foreach($data as $srm){
            if($request->start_time >= $srm->start_time && $request->start_time <= $srm->end_time){
                return redirect()->route('admin.schedules.create') -> with('error', 'The time is not available');
            }
            else if($request->start_time <= $srm->start_time && $request->end_time >= $srm->end_time){
                return redirect()->route('admin.schedules.create')-> with('error', 'The time is not available');
            }
            else if($request->end_time >= $srm->start_time && $request->end_time <= $srm->end_time){
                return redirect()->route('admin.schedules.create')-> with('error', 'The time is not available');
            }
        }

        Schedule::create($request->all());
        $schedule = Schedule::latest('id')->first();
        $schedule_id = $schedule -> id;

        $seat = Seat::where('room_id', $request->room_id)->get();

        foreach($seat as $s){
            $seat_schedule = [];
            $seat_schedule = Arr::add($seat_schedule, 'schedule_id', $schedule_id);
            $seat_schedule = Arr::add($seat_schedule, 'seat_id', $s->id);
            $seat_schedule = Arr::add($seat_schedule, 'status', $s -> status);

            schedule_seat::create($seat_schedule);
        }

        return redirect()->route('admin.schedules.index');
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

        return view('admin.schedule.info',[
            'seats' => $seats,
            'type' => $type,
            'schedule' => $schedule,
            'room' => $room,
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
        

        return view('Admin.schedule.edit',[
            
            'movies' => $movies,
            'rooms' => $rooms,
            'schedulesInfo' => $schedulesInfo,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
        $data = Schedule::all()
        -> where('date', $request-> date)
        -> where('room_id', $request->room_id);
        
        foreach($data as $srm){
            if($request->start_time >= $srm->start_time && $request->start_time <= $srm->end_time){
                return redirect()->route('admin.schedules.edit',$schedule -> id) -> with('error', 'The time is not available');
            }
            else if($request->start_time <= $srm->start_time && $request->end_time >= $srm->end_time){
                return redirect()->route('admin.schedules.edit',$schedule -> id)-> with('error', 'The time is not available');
            }
            else if($request->end_time >= $srm->start_time && $request->end_time <= $srm->end_time){
                return redirect()->route('admin.schedules.edit',$schedule -> id)-> with('error', 'The time is not available');
            }
        }

        
        $schedule -> update($request->all());

        $seat = Seat::where('room_id', $request->room_id)->get();
        $schedule_seat = schedule_seat::where('schedule_id', '=', $schedule -> id);
        foreach($seat as $s){
            $seat_schedule = [];
            $seat_schedule = Arr::add($seat_schedule, 'schedule_id', $schedule -> id);
            $seat_schedule = Arr::add($seat_schedule, 'seat_id', $s->id);
            $seat_schedule = Arr::add($seat_schedule, 'status', $s -> status);

            $schedule_seat -> update($seat_schedule);
        }

        return redirect()->route('admin.schedules.index');

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

        return redirect()->route('admin.schedules.index');
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

        return view('Customer.orderTickets',[
            'seats' => $seats,
            'schedule' => $schedule,
        ]);
    }

    public function orderTicket($seat_id, $schedule_id ){
        $type = Seat_type::all();
        $seats = Seat::all();
        $seat = schedule_seat::where('seat_id','=',$seat_id)
        ->where('schedule_id','=',$schedule_id)
        ->get();

        foreach($seat as $seat){
            if($seat -> status == 0){
                $array = [];
                $array = Arr::add($array, 'status', 2);
                schedule_seat::where('seat_id', '=', $seat_id)->where('schedule_id','=', $schedule_id) -> update($array);
            }else{
                $array = [];
                $array = Arr::add($array, 'status', 0);
                schedule_seat::where('seat_id', '=', $seat_id)->where('schedule_id','=', $schedule_id) -> update($array);
            }
        }


            return redirect()->route('order',[
                'schedule' => $schedule_id,
                'seats' => $seats,
                'type' => $type,
            ]);
    }

    public function bookTicket($schedule_id){
        $seats = schedule_seat::join('seats', 'seats.id', '=', 'schedule_seats.seat_id')
        ->join('seat_types', 'seat_types.id', '=', 'seats.type_id')
        ->where('schedule_seats.schedule_id', '=', $schedule_id)
        ->where('schedule_seats.status', '=', 2)
        ->get(['schedule_seats.*', 'seats.*', 'seat_types.*', 'schedule_seats.status as schedule_seat_status', 'seats.id as seat_id']);

        $final_price = 0;

        foreach($seats as $seat){
            $final_price = $seat -> price;
            $count = Ticket::where('schedule_id', '=', $schedule_id)->where('seat_id', '=', $seat->seat_id)->count();
            if($count == 0){
            $array = [];
            $array = Arr::add($array, 'schedule_id', $schedule_id);
            $array = Arr::add($array, 'seat_id', $seat -> seat_id);
            $array = Arr::add($array, 'final_price', $final_price);
            Ticket::create($array);
            $arr = [];
            $arr = Arr::add($arr, 'status', 3);
            schedule_seat::where('seat_id', '=', $seat->seat_id)->where('schedule_id','=', $schedule_id) -> update($arr);
        }else{
            // $error = 'This seat is already booked';
        }
        }
        
        return redirect()->route('order',[
            'schedule' => $schedule_id,
        ]);
    }
}
