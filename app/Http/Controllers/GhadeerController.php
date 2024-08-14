<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class GhadeerController extends Controller
{
    


    public function blogs(){
        $All_blogs = Blogs::all();
        // return $All_blogs; 
        return view('site.layouts.mohammed',compact('All_blogs'));
    }
}
