<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Categories;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::get();

        return view('admin.categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        try{
            //insert to db
            Categories::create([
                'name' => $request->name,
                'image' => $request->image,
            ]);

            return back()->with('success','The Category has inserted successfully');
        }
        catch (Exception $e){

            return back()->withErrors(['error' => 'something happend']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreRequest $request, Categories $category)
    {
        $category->name = $request->name;


        if (!$request->image == null) {
            $category->image = $request->image;
        }

        $category->save();
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return back();
    }
}
