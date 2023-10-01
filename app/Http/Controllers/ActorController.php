<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.actor.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorRequest $request)
    {
        $actor_img = $request->file('actor_img')-> getClientOriginalName();

        if(!Storage::exists('public/img/actor/'.$actor_img)){
            Storage::putFileAs('public/img/actor/', $request->file('actor_img'), $actor_img);
        }

        $array = [];
        $array = Arr::add($array, 'actor_name', $request->actor_name);
        $array = Arr::add($array, 'actor_image', $actor_img);

        Actor::create($array);
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        //
    }
}
