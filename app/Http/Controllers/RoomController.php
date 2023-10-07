<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Seat;
use App\Models\Seat_type;
use Illuminate\Support\Arr;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Room::all();
        return view('Admin.room.main',[
            'rooms' => $rooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.room.create');
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
                    Seat::create($seat);
                }
            }elseif($type_seat == 1){
                 for((int)$i = 37; $i <= 60; $i++){
                    $seat = [];
                    $seat = Arr::add($seat, 'number', $i);
                    $seat = Arr::add($seat, 'type_id', $type -> id);    
                    $seat = Arr::add($seat, 'room_id', $room_id);
                    Seat::create($seat);
                }
            }else{
                for((int)$i = 61; $i <= 66; $i++){
                    $seat = [];
                    $seat = Arr::add($seat, 'number', $i);
                    $seat = Arr::add($seat, 'room_id', $room_id);
                    $seat = Arr::add($seat, 'type_id', $type -> id); 
                    Seat::create($seat);
                }
            }
         }

        return redirect()->route('admin.rooms.index');
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
        $seat = Seat::all();
        return view('admin.room.info',[
            'room' => $room,
            'seat' => $seat,
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        $seat = Seat::where('room_id', '=', $room -> id);

        $seat->delete();

        $room->delete();

        return redirect()->route('admin.rooms.index');
    }
}
