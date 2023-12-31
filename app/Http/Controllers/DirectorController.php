<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Movie;
use App\Models\director_movie;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();
        $admin = Auth::guard('staff')->user();

        return view('admin.director.main',[
            'directors' => $directors,
            'admin' => $admin,
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::guard('staff')->user();

        return view('admin.director.create',[
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDirectorRequest $request)
    {
        $director_img = $request->file('director_img')-> getClientOriginalName();

        if(!Storage::exists('public/img/director/'.$director_img)){
            Storage::putFileAs('public/img/director/', $request->file('director_img'), $director_img);
        }

        $array = [];
        $array = Arr::add($array, 'director_name', $request->director_name);
        $array = Arr::add($array, 'director_image', $director_img);

        Director::create($array);

        return redirect()->route('admin.directors.index')->with('success', 'Add director successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($movie_director)
    {
        //
        $director = Director::find($movie_director);
        $movie_director = Movie::join('director_movies', 'director_movies.movie_id', '=', 'movies.id')
        ->join('directors', 'directors.id', '=', 'director_movies.director_id')
        ->where('directors.id', $director -> id)
        ->get(['movies.*', 'director_movies.*', 'directors.*']);

        if(Auth::guard('customers')->check()){
            $user = Auth::guard('customers')->user();
            return view('Customer.director',[
                'director' => $director,
                'movie_director' => $movie_director,
                'user' => $user,
            ]);
        }else{
            return view('Customer.director',[
                'director' => $director,
                'movie_director' => $movie_director,
            ]);
        }

       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        $admin = Auth::guard('staff')->user();

        return view('admin.director.edit',[
            'director' => $director,
            'admin' => $admin,
        ]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectorRequest $request, Director $director)
    {
        if($request->hasFile('director_img')){
            $director_img = $request->file('director_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/director/'.$director_img)){
                Storage::putFileAs('public/img/director/', $request->file('director_img'), $director_img);
            }
        }else{
            $director_img = $director->director_image;
        } 

        $array = [];
        $array = Arr::add($array, 'director_name', $request->director_name);
        $array = Arr::add($array, 'director_image', $director_img);

        $director->update($array);

        return redirect()->route('admin.directors.index')->with('success', 'Edit director successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        director_movie::where('director_id', $director->id)->delete();
      
        $director->delete();

        return redirect()->route('admin.directors.index')->with('success', 'Delete director successfully!');
    }
}
