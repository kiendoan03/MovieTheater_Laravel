<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Movie;
use App\Models\Room;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $srm = Schedule::join('movies', 'movies.id', '=', 'schedules.movie_id')
        ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
        ->get(['movies.*', 'schedules.*','schedules.id as schedule_id', 'rooms.*']);

        return view('Admin.schedule.main',[
            'schedulesInfo' => $srm,
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
        return redirect()->route('admin.schedules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $movies = Movie::all();  
        $rooms = Room::all();
        $srm = Schedule::join('movies', 'movies.id', '=', 'schedules.movie_id')
        ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
        ->get(['movies.*', 'schedules.*','schedules.id as schedule_id', 'rooms.*'])
        ->where('schedules_id', $schedule->schedule_id);
        
        return view('Admin.schedule.edit',[
            
            'movies' => $movies,
            'rooms' => $rooms,
            'schedulesInfo' => $srm,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
        $schedule->delete();

        return redirect()->route('admin.schedules.index');
    }
}
