<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Director;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Movie.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $movies = Movie::all();
        $actors = Actor::all();
        $directors = Director::all();
        $categories = Category::all();
        return view('Admin.Movie.create',[
            'movies' => $movies,
            'actors' => $actors,
            'directors' => $directors,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
   
        $movie_thumbnail = $request->file('movie_thumbnail')-> getClientOriginalName();
        $movie_trailer = $request->file('movie_trailer')-> getClientOriginalName();
        $movie_poster = $request->file('movie_poster')-> getClientOriginalName();

        if(!Storage::exists('public/img/movie_poster/'.$movie_poster)){
            Storage::putFileAs('public/img/movie_poster/', $request->file('movie_poster'), $movie_poster);
        }
        if(!Storage::exists('public/img/movie_thumbnail/'.$movie_thumbnail)){
            Storage::putFileAs('public/img/movie_thumbnail/', $request->file('movie_thumbnail'), $movie_thumbnail);
        }
        if(!Storage::exists('public/movie_trailer/'.$movie_trailer)){
            Storage::putFileAs('public/movie_trailer/', $request->file('movie_trailer'), $movie_trailer);
        }
        //$obj = new Movie();
        $array =[];
        $array = Arr::add($array, 'movie_name', $request->movie_name);
        $array = Arr::add($array, 'rating', 5);
        $array = Arr::add($array, 'length', $request->movie_length);
        $array = Arr::add($array, 'release_date', $request->movie_release_date);
        $array = Arr::add($array, 'movie_genre', $request->movie_genre);
        $array = Arr::add($array, 'age', $request->movie_age);
        $array = Arr::add($array, 'language', $request->movie_language);
        $array = Arr::add($array, 'movie_actor', $request->movie_actor);
        $array = Arr::add($array, 'movie_director', $request->movie_director);
        $array = Arr::add($array, 'description', $request->movie_description);
        $array = Arr::add($array, 'trailer', $movie_trailer);
        $array = Arr::add($array, 'poster_img', $movie_poster);
        $array = Arr::add($array, 'thumbnail_img', $movie_thumbnail);

        Movie::create($array);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
