<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class ApiController extends Controller
{


    public function index(Request $request)
    {
        $value = $request->input('query');
        $blogs = Blogs::where('title', 'LIKE', '%' . $value . '%')->orwhere('content', 'LIKE', '%' . $value . '%')->get();

        return response()->json($blogs); // أعاد النتائج مباشرة  
    }
}
