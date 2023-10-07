<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schedules = Schedule::all();
        return view('Admin.schedule.main',[
            'schedules' => $schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $schedules = Schedule::all();
        $movies = Schedule::all();  
        $rooms = Schedule::all();
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
        //

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
        //
        $schedules = Schedule::all();
        $movies = Schedule::all();  
        $rooms = Schedule::all();

        $schedule_movie = Schedule::join('movies', 'movies.id', '=', 'schedules.movie_id')
        ->get(['movies.*', 'schedules.*']);

        $schedule_room = Schedule::join('rooms', 'rooms.id', '=', 'schedules.room_id')
        ->get(['movies.*', 'schedules.*']);

        return view('Admin.schedule.edit',[
            'schedules' => $schedules,
            'movies' => $movies,
            'rooms' => $rooms,
            'schedule_movie' => $schedule_movie,
            'schedule_room' => $schedule_room,
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
