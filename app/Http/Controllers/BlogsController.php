<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\EditBlogRequest;
use App\Models\Authors;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\CategoriesBlogs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $blogs = Blogs::get();
        // $results = DB::table('authors')
        //     ->rightJoin('blogs', 'authors.id', '=', 'blogs.author_id')->get();
        // // dd($results);
        // // return $results;
        $blogs_with_authors = Blogs::with('authors')->get();
        // return$blogs_with_authors;

        return  view('admin.blogs.index', compact('blogs_with_authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $authors = Authors::get();
        return  View('admin.blogs.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        // dd($request->input());

        try {

            // if ($request->slider == '0') {
            //     $slider = 0;
            // }elseif($request->slider == '1'){
            //     $slider = 1;
            // }
            $blog = Blogs::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'author_id' => $request->resoureceName,
                'slider' => $request->slider,
                
            ]);

            foreach ($request->categories as $category) {
                CategoriesBlogs::create([
                    'post_id' => $blog->id,
                    'category_id' => $category
                ]);
            }
            // endforeach

            return back()->with('success', 'The Blog has inserted successfully');
        } catch (Exception $e) {

            return back()->withErrors(['error' => 'something happend']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blogs::findOrFail($id);
        // Get author data based on a specific blog
        $author_ID = $blog->author_id;
        $author_data = Authors::find($author_ID);
        return view('admin.blogs.show', compact('blog', 'author_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blogs::with('authors', 'categories')->findOrFail($id);
        // return $blog;
        // return $blog->categories;
        $authors = Authors::get();
        $categories = Categories::all();
        return view('admin.blogs.edit', compact('blog', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(EditBlogRequest $request, Blogs $blog)
    public function update(EditBlogRequest $request, Blogs $blog)
    {
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author_id = $request->resoureceName;
        $blog->slider = $request->slider;

        if ($request->image != null) {
            $blog->image = $request->image;
        }
        $blog->save();
        // return count($request->categories);
        // $gg = CategoriesBlogs::where('post_id', $blog->id)->get();
        $blog->categoriesBlogs()->delete();  

        // ثم نضيف التصنيفات الجديدة  
        foreach ($request->categories as $category) {  
            $blog->categoriesBlogs()->create([  
                'post_id' => $blog->id,  
                'category_id' => $category  
            ]);  
        }  




        return back()->with('success', 'The Blog has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blogs::findOrFail($id);
        $blog->delete();
        return back()->with('danger', 'The Blog has deleted successfully');
    }
}
