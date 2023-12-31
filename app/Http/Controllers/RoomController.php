<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Schedule;
use App\Models\schedule_seat;
use App\Models\Seat;
use App\Models\Seat_type;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Room::all();
        $admin = Auth::guard('staff')->user();

        return view('Admin.room.main',[
            'rooms' => $rooms,
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

        return view('Admin.room.create',[
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        //
        $array = [];
        $array = Arr::add($array, 'room_name', $request->room_name);
        $array = Arr::add($array, 'room_capacity','66');

        Room::create($array); 
        $room = Room::latest('id')->first();
        $room_id = $room -> id;
        $type = Seat_type::all();
        foreach($type as $type){
            $type_seat = $type -> type;
            if($type_seat == 0){
                for((int)$i = 1; $i <= 36; $i++){
                    $seat = [];
                    $seat = Arr::add($seat, 'number', $i);
                    $seat = Arr::add($seat, 'type_id', $type -> id); 
                    $seat = Arr::add($seat, 'room_id', $room_id);
                    $seat = Arr::add($seat, 'status', '0');
                    Seat::create($seat);
                }
            }elseif($type_seat == 1){
                 for((int)$i = 37; $i <= 60; $i++){
                    $seat = [];
                    $seat = Arr::add($seat, 'number', $i);
                    $seat = Arr::add($seat, 'type_id', $type -> id);    
                    $seat = Arr::add($seat, 'room_id', $room_id);
                    $seat = Arr::add($seat, 'status', '0');
                    Seat::create($seat);
                }
            }else{
                for((int)$i = 61; $i <= 66; $i++){
                    $seat = [];
                    $seat = Arr::add($seat, 'number', $i);
                    $seat = Arr::add($seat, 'room_id', $room_id);
                    $seat = Arr::add($seat, 'type_id', $type -> id); 
                    $seat = Arr::add($seat, 'status', '0');
                    Seat::create($seat);
                }
            }
         }

        return redirect()->route('admin.rooms.index')->with('success', 'Add room successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
        $type = Seat_type::all();
        $seats = Seat::where('room_id', '=', $room -> id)->get();
        $admin = Auth::guard('staff')->user();

        return view('admin.room.info',[
            'room' => $room,
            'seats' => $seats,
            'type' => $type,
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room, $seat_id , $room_id)
    {
        //
        $type = Seat_type::all();
        $seats = Seat::all();
        $seat = Seat::find($seat_id);
        $room = Room::find($room_id);
        $schedule_seat = schedule_seat::where('seat_id', '=', $seat_id) -> get();

        if($seat -> status == 0){
                $array = [];
                $array = Arr::add($array, 'status', 1);
                $seat -> update($array);
            }else{
                $array = [];
                $array = Arr::add($array, 'status', 0);
                $seat -> update($array);
            }
            foreach($schedule_seat as $schedule_seat){
                if($schedule_seat -> status == 0){
                    $arr = [];
                    $arr = Arr::add($arr, 'status', 1);
                    schedule_seat::where('seat_id', '=', $seat_id) -> update($arr);
                }else{
                    $arr = [];
                    $arr = Arr::add($arr, 'status', 0);
                    schedule_seat::where('seat_id', '=', $seat_id) -> update($arr);
                }
            }

            return redirect()->route('admin.rooms.edit',[
                'room' => $room,
                'seats' => $seats,
                'type' => $type,
            ])->with('success', 'Update room successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        $schedule_room = Schedule::where('room_id', '=', $room -> id)->count();
        if($schedule_room > 0){
            return redirect()->route('admin.rooms.index')->with('error', 'Delete room fail!');
        }else{
            $seat = Seat::where('room_id', '=', $room -> id);

            $seat->delete();

            $room->delete();

            return redirect()->route('admin.rooms.index')->with('success', 'Delete room successfully!');     
        }
       
    }
}
