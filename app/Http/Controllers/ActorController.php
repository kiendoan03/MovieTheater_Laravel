<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\actor_movie;
use App\Models\Movie;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::all();
        $admin = Auth::guard('staff')->user();

        return view('admin.actor.main',[
            'actors' => $actors,
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::guard('staff')->user();

        return view('admin.actor.create',[
            'admin' => $admin,
        ]);
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

        return redirect()->route('admin.actors.index')->with('success', 'Add actor successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($movie_actor)
    {
        //
        $actor = Actor::find($movie_actor);
        $movie_actor = Movie::join('actor_movies', 'actor_movies.movie_id', '=', 'movies.id')
        ->join('actors', 'actors.id', '=', 'actor_movies.actor_id')
        ->where('actors.id', $actor -> id)
        ->get(['movies.*', 'actor_movies.*', 'actors.*']);

        if(Auth::guard('customers')->check()){
            $user = Auth::guard('customers')->user();
            return view('Customer.actor',[
                'actor' => $actor,
                'movie_actor' => $movie_actor,
                'user' => $user,
            ]); 
        }else{
            return view('Customer.actor',[
                'actor' => $actor,
                'movie_actor' => $movie_actor,
            ]); 
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        $admin = Auth::guard('staff')->user();

        return view('admin.actor.edit',[
            'actor' => $actor,
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        if($request->hasFile('actor_img')){
            $actor_img = $request->file('actor_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/actor/'.$actor_img)){
                Storage::putFileAs('public/img/actor/', $request->file('actor_img'), $actor_img);
            }
        }else{
            $actor_img = $actor->actor_image;
        }

        $array = [];
        $array = Arr::add($array, 'actor_name', $request->actor_name);
        $array = Arr::add($array, 'actor_image', $actor_img);

        $actor->update($array);

        return redirect()->route('admin.actors.index')->with('success', 'Edit actor successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
         actor_movie::where('actor_id', $actor->id)->delete();
        
        $actor->delete();

        return redirect()->route('admin.actors.index')->with('success', 'Delete actor successfully!'); 
    }
}
