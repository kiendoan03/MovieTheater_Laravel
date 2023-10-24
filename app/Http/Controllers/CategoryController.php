<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\category_movie;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $admin = Auth::guard('staff')->user();

        return view('admin.category.main',[
            'categories' => $categories,
            'admin' => $admin,
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::guard('staff')->user();

        return view('admin.category.create',[
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $array = [];
        $array = Arr::add($array, 'category_name', $request->category_name);

        Category::create($array); 

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $admin = Auth::guard('staff')->user();
        
        return view('admin.category.edit',[
            'category' => $category,
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $cate_movie = category_movie::where('category_id', $category->id);
        foreach($cate_movie as $item){
            $item->delete();
        }
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
