<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\CategoriesBlogs;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $lateast_blog = Blogs::with('authors')->latest()->take(2)->get();
        $oldest_blog = Blogs::with('authors')->oldest()->take(2)->get();
        $slider_blogs = Blogs::latest()->take(3)->where('slider', 1)->get();
        $categories = Categories::get();
        $categorie = Categories::take(2)->get();

        // return $lateast_blog;
        $main_category = Categories::with([
            'categories' => function ($query) {
                $query->limit(2);
            },
            'categories.post',
            'categories.post.authors'

        ])->get();
        // return $main_category;
        return view('site.layouts.index', compact('lateast_blog', 'oldest_blog', 'slider_blogs', 'categories', 'main_category'));
    }


    public function details(string $id)
    {
        $lateast_blog = Blogs::with('authors')->latest()->take(2)->get();
        $oldest_blog = Blogs::with('authors')->oldest()->take(2)->get();
        $slider_blogs = Blogs::latest()->take(3)->where('slider', 1)->get();
        $categories = Categories::get();
        $categorie = Categories::take(2)->get();

        $blog = Blogs::where('id', $id)->with('categories.category', 'authors')->get();
        // return $blog;
        $main_category = Categories::with('categories', 'categories.post', 'categories.post.authors')->limit(4)->get();
        // return $main_category;
        return view('site.layouts.details', compact('lateast_blog', 'oldest_blog', 'slider_blogs', 'categories', 'main_category', 'blog'));
    }

    public function category_post($id)
    {
        $lateast_blog = Blogs::with('authors')->latest()->take(2)->get();
        $oldest_blog = Blogs::with('authors')->oldest()->take(2)->get();
        $categories = Categories::get();
        $categorie = Categories::take(2)->get();

        $cats = CategoriesBlogs::where('category_id', $id)->with('post')->get();
        // return $cats;
        return view('site.layouts.AllcategoryWithPost', compact('cats', 'lateast_blog', 'oldest_blog', 'categories'));
    }
}
