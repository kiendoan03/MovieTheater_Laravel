<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Director;
use App\Models\category_movie;
use App\Models\director_movie;
use App\Models\actor_movie;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
        $now = Carbon::today();
        $now -> setTimezone('Asia/Ho_Chi_Minh');  
        $admin = Auth::guard('staff')->user();

        return view('Admin.Movie.main',[
            'movies' => $movies,
            'now' => $now,
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $movies = Movie::all();
        $actors = Actor::all()->sortBy('actor_name');
        $directors = Director::all()->sortBy('director_name');
        $categories = Category::all()->sortBy('category_name');
        $admin = Auth::guard('staff')->user();

        return view('Admin.Movie.create',[
            'movies' => $movies,
            'actors' => $actors,
            'directors' => $directors,
            'categories' => $categories,
            'admin' => $admin,
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
        $array = Arr::add($array, 'end_date', $request->movie_end_date);
        $array = Arr::add($array, 'age', $request->movie_age);
        $array = Arr::add($array, 'language', $request->movie_language);
        $array = Arr::add($array, 'description', $request->movie_description);
        $array = Arr::add($array, 'trailer', $movie_trailer);
        $array = Arr::add($array, 'poster_img', $movie_poster);
        $array = Arr::add($array, 'logo_img', $movie_logo);
        $array = Arr::add($array, 'thumbnail_img', $movie_thumbnail);

        Movie::create($array);

        $movie = Movie::latest('id')->first();
        $movie_id = $movie -> id;

        foreach($request->input('movie_genre') as $cate_id){
            $cate_movie =[];
            $cate_movie = Arr::add($cate_movie, 'category_id', $cate_id);
            $cate_movie = Arr::add($cate_movie, 'movie_id',(string)$movie_id);
            category_movie::create($cate_movie);
        }

        foreach($request->input('movie_actor') as $actor_id){
            $actor_movie =[];
            $actor_movie = Arr::add($actor_movie, 'actor_id', $actor_id);
            $actor_movie = Arr::add($actor_movie, 'movie_id', (string)$movie_id);
            actor_movie::create($actor_movie);
        }
        
        foreach($request->input('movie_director') as $director_id){
            $director_movie =[];
            $director_movie = Arr::add($director_movie, 'director_id', $director_id);
            $director_movie = Arr::add($director_movie, 'movie_id', (string)$movie_id);
            director_movie::create($director_movie);
        }

        return redirect()->route('admin.movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movies = Movie::all();
        $now = Carbon::today();
        $now -> setTimezone('Asia/Ho_Chi_Minh');    

        $movie_show = Movie::where('release_date', '<=', $now)
        -> where('end_date', '>=', $now)
        ->get();

        if(Auth::guard('customers')->check()){
            $user = Auth::guard('customers')->user();
            return view('Customer.home',[
                'movies' => $movies,
                'now' => $now,
                'movie_show' => $movie_show,
                'user' => $user,
            ]);
        }else{
             return view('Customer.home',[
                'movies' => $movies,
                'now' => $now,
                'movie_show' => $movie_show,
            ]);
        }
       
    }

    public function detail(Movie $movie){
        $actors = Actor::all();
        $directors = Director::all();
        $categories = Category::all();
        $date =  $movie->release_date;
        $end =  $movie->end_date;
        $movie_cate = Movie::join('category_movies', 'category_movies.movie_id', '=', 'movies.id')
        ->join('categories', 'categories.id', '=', 'category_movies.category_id')
        ->where('movies.id', $movie -> id)
        ->get(['movies.*', 'category_movies.*', 'categories.*']);

        foreach($movie_cate as $cate){
            $related_movie = Movie::join('category_movies', 'category_movies.movie_id', '=', 'movies.id')
            ->join('categories', 'categories.id', '=', 'category_movies.category_id')
            ->where('categories.id',  $cate -> category_id)
            ->get(['movies.*', 'category_movies.*', 'categories.*']);
        }

        $movie_actor = Movie::join('actor_movies', 'actor_movies.movie_id', '=', 'movies.id')
        ->join('actors', 'actors.id', '=', 'actor_movies.actor_id')
        ->where('movies.id', $movie -> id)
        ->get(['movies.id', 'actor_movies.*', 'actors.*']);

        $movie_director = Movie::join('director_movies', 'director_movies.movie_id', '=', 'movies.id')
        ->join('directors', 'directors.id', '=', 'director_movies.director_id')
        ->where('movies.id', $movie -> id)
        ->get(['movies.id', 'director_movies.*', 'directors.*']);

        $now = Carbon::today();

        $schedules = Schedule::join('movies', 'movies.id', '=', 'schedules.movie_id')
        ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
        ->where('movies.id', $movie -> id)
        ->where('schedules.date', '>=', $now)
        ->orderBy('schedules.date', 'ASC')
        ->get(['movies.*','schedules.*','rooms.*','schedules.id as schedule_id']);

        if(Auth::guard('customers')->check()){
            $user = Auth::guard('customers')->user();
            return view('Customer.movieDetailed',[
                'movie' => $movie,
                'actors' => $actors,
                'directors' => $directors,
                'categories' => $categories,
                'date' => $date,
                'end' => $end,
                'movie_cate' => $movie_cate,
                'movie_actor' => $movie_actor,
                'movie_director' => $movie_director,
                'related_movie' => $related_movie,
                'schedules' => $schedules,
                'user' => $user,
            ]);
        }else{
           return view('Customer.movieDetailed',[
            'movie' => $movie,
            'actors' => $actors,
            'directors' => $directors,
            'categories' => $categories,
            'date' => $date,
            'end' => $end,
            'movie_cate' => $movie_cate,
            'movie_actor' => $movie_actor,
            'movie_director' => $movie_director,
            'related_movie' => $related_movie,
            'schedules' => $schedules,
        ]);
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $actors = Actor::all()->sortBy('actor_name');
        $directors = Director::all()->sortBy('director_name');
        $categories = Category::all()->sortBy('category_name');
        $date =  $movie->release_date;
        $end = $movie->end_date;
        $movie_cate = Movie::join('category_movies', 'category_movies.movie_id', '=', 'movies.id')
        ->join('categories', 'categories.id', '=', 'category_movies.category_id')
        ->where('movies.id', $movie -> id)
        ->get(['movies.id', 'category_movies.*', 'categories.*']);

        $movie_actor = Movie::join('actor_movies', 'actor_movies.movie_id', '=', 'movies.id')
        ->join('actors', 'actors.id', '=', 'actor_movies.actor_id')
        ->where('movies.id', $movie -> id)
        ->get(['movies.id', 'actor_movies.*', 'actors.*']);

        $movie_director = Movie::join('director_movies', 'director_movies.movie_id', '=', 'movies.id')
        ->join('directors', 'directors.id', '=', 'director_movies.director_id')
        ->where('movies.id', $movie -> id)
        ->get(['movies.id', 'director_movies.*', 'directors.*']);

        $admin = Auth::guard('staff')->user();

        return view('Admin.Movie.edit',[
            'movie' => $movie,
            'actors' => $actors,
            'directors' => $directors,
            'categories' => $categories,
            'date' => $date,
            'end' => $end,
            'movie_cate' => $movie_cate,
            'movie_actor' => $movie_actor,
            'movie_director' => $movie_director,
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
        if($request->hasFile('movie_logo')){
            $logo_img = $request->file('movie_logo')-> getClientOriginalName();

            if(!Storage::exists('public/img/movie_logo/'.$logo_img)){
                Storage::putFileAs('public/img/movie_logo/', $request->file('movie_logo'), $logo_img);
            }
        }else{
            $logo_img = $movie->logo_img;
        }

        if($request->hasFile('movie_poster')){
            $poster_img = $request->file('movie_poster')-> getClientOriginalName();

            if(!Storage::exists('public/img/movie_poster/'.$poster_img)){
                Storage::putFileAs('public/img/movie_poster/', $request->file('movie_poster'), $poster_img);
            }
        }else{
            $poster_img = $movie->poster_img;
        }

        if($request->hasFile('movie_thumbnail')){
            $thumbnail_img = $request->file('movie_thumbnail')-> getClientOriginalName();

            if(!Storage::exists('public/img/movie_thumbnail/'.$thumbnail_img)){
                Storage::putFileAs('public/img/movie_thumbnail/', $request->file('movie_thumbnail'), $thumbnail_img);
            }
        }else{
            $thumbnail_img = $movie->thumbnail_img;
        }

        if($request->hasFile('movie_trailer')){
            $movie_trailer = $request->file('movie_trailer')-> getClientOriginalName();

            if(!Storage::exists('public/movie_trailer/'.$movie_trailer)){
                Storage::putFileAs('public/movie_trailer/', $request->file('movie_trailer'), $movie_trailer);
            }
        }else{
            $movie_trailer = $movie->trailer;
        }
        $array = [];
        $array = Arr::add($array, 'movie_name', $request->movie_name);
        $array = Arr::add($array, 'rating', $movie -> rating);
        $array = Arr::add($array, 'length', $request->movie_length);
        $array = Arr::add($array, 'release_date', $request->movie_release_date);
        $array = Arr::add($array, 'end_date', $request->movie_end_date);
        $array = Arr::add($array, 'age', $request->movie_age);
        $array = Arr::add($array, 'language', $request->movie_language);
        $array = Arr::add($array, 'description', $request->movie_description);
        $array = Arr::add($array, 'logo_img', $logo_img);
        $array = Arr::add($array, 'poster_img', $poster_img);
        $array = Arr::add($array, 'thumbnail_img', $thumbnail_img);
        $array = Arr::add($array, 'trailer', $movie_trailer);

        $movie->update($array);

        $movie_id = $movie -> id;

        
        category_movie::where('movie_id','=',$movie -> id) -> delete();

        actor_movie::where('movie_id','=',$movie -> id) -> delete();

        director_movie::where('movie_id','=',$movie -> id) -> delete();
  

        foreach($request->input('movie_genre') as $cate_id){
            $cate_movie =[];
            $cate_movie = Arr::add($cate_movie, 'category_id', $cate_id);
            $cate_movie = Arr::add($cate_movie, 'movie_id',(string)$movie_id);
            category_movie::create($cate_movie);
        }

        foreach($request->input('movie_actor') as $actor_id){
            $actor_movie =[];
            $actor_movie = Arr::add($actor_movie, 'actor_id', $actor_id);
            $actor_movie = Arr::add($actor_movie, 'movie_id', (string)$movie_id);
            actor_movie::create($actor_movie);
        }
        
        foreach($request->input('movie_director') as $director_id){
            $director_movie =[];
            $director_movie = Arr::add($director_movie, 'director_id', $director_id);
            $director_movie = Arr::add($director_movie, 'movie_id', (string)$movie_id);
            director_movie::create($director_movie);
        }

        return redirect()->route('admin.movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
        $cate_movie = category_movie::where('movie_id', '=', $movie -> id);
        $actor_movie = actor_movie::where('movie_id', '=', $movie -> id);
        $director_movie = director_movie::where('movie_id', '=', $movie -> id);
        foreach($cate_movie as $cate){
            $cate->delete();
        }
        foreach($actor_movie as $actor){
            $actor->delete();
        }
        foreach($director_movie as $director){
            $director->delete();
        }
        $movie->delete();

        return redirect()->route('admin.movies.index');
    }
}
