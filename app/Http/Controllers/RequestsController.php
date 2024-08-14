<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index()
{
    
    $requests_with_authors = Request::with('requests')->get();
    // return$blogs_with_authors;

    return  view('admin.Requests.index', compact('blogs_with_authors'));
}

}
