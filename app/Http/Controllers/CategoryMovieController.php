<?php

namespace App\Http\Controllers;

use App\Models\category_movie;
use App\Http\Requests\Storecategory_movieRequest;
use App\Http\Requests\Updatecategory_movieRequest;

class CategoryMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storecategory_movieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(category_movie $category_movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category_movie $category_movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecategory_movieRequest $request, category_movie $category_movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category_movie $category_movie)
    {
        //
    }
}
