<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorewisheRequest;
use App\Models\Wishes;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

class wishesControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $wishes_with_authors = Wishes::with('wishes')->get();
      

        return  view('admin.wishes.index', compact('wishes_with_authors'));
    }
}