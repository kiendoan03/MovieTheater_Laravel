<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.director.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.director.create');
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectorRequest $request, Director $director)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        //
    }
}
