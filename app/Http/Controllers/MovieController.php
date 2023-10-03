<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $movies = Movie::all();
        return view('Admin.Movie.main',[
            'movies' => $movies,
        ]);
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
        $movie_logo = $request->file('movie_logo')-> getClientOriginalName();

        if(!Storage::exists('public/img/movie_logo/'.$movie_logo)){
            Storage::putFileAs('public/img/movie_logo/', $request->file('movie_logo'), $movie_logo);
        }
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
        $array = Arr::add($array, 'logo_img', $movie_logo);
        $array = Arr::add($array, 'thumbnail_img', $movie_thumbnail);

        Movie::create($array);

        return redirect()->route('admin.movies.index');
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
        $actors = Actor::all();
        $directors = Director::all();
        $categories = Category::all();
        $date =  $movie->release_date;
        // dd($movie->release_date);
        return view('Admin.Movie.edit',[
            'movie' => $movie,
            'actors' => $actors,
            'directors' => $directors,
            'categories' => $categories,
            'date' => $date,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
        if($request->hasFile('logo_img')){
            $logo_img = $request->file('logo_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/movie/'.$logo_img)){
                Storage::putFileAs('public/img/movie/', $request->file('logo_img'), $logo_img);
            }
        }else{
            $logo_img = $movie->logo_img;
        }

        if($request->hasFile('actor_img')){
            $actor_img = $request->file('actor_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/actor/'.$actor_img)){
                Storage::putFileAs('public/img/actor/', $request->file('actor_img'), $actor_img);
            }
        }else{
            $actor_img = $movie->actor_img;
        }

        if($request->hasFile('actor_img')){
            $actor_img = $request->file('actor_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/actor/'.$actor_img)){
                Storage::putFileAs('public/img/actor/', $request->file('actor_img'), $actor_img);
            }
        }else{
            $actor_img = $movie->actor_image;
        }

        if($request->hasFile('actor_img')){
            $actor_img = $request->file('actor_img')-> getClientOriginalName();

            if(!Storage::exists('public/img/actor/'.$actor_img)){
                Storage::putFileAs('public/img/actor/', $request->file('actor_img'), $actor_img);
            }
        }else{
            $actor_img = $movie->actor_image;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
