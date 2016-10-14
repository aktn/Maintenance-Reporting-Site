<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class IssuesController extends Controller
{
    public function create()
    {
    	$categories = Category::all();
    	return view('issues.create', compact('categories'));
    }
}
