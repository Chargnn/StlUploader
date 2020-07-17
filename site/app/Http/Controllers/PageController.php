<?php

namespace App\Http\Controllers;

use App\Category;
use App\StlModel;
use App\Tag;

class PageController extends Controller
{
    public function index()
    {
        $stls = StlModel::all();
        $tags = Tag::all();
        $categories = Category::all();

        return view('index')->with(['stls' => $stls, 'tags' => $tags, 'categories' => $categories]);
    }
}
