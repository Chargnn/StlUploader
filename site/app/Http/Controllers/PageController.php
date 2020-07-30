<?php

namespace App\Http\Controllers;

use App\Category;
use App\StlModel;
use App\Tag;

class PageController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $search = request('search');
            $stls = StlModel::with('tags')->with('categories')->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('tags', function($query) use ($search){
                        $query->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('categories', function($query) use ($search){
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            })->get();
        } else {
            $stls = StlModel::all();
        }

        $tags = Tag::all();
        $categories = Category::all();

        return view('index')->with(['stls' => $stls, 'tags' => $tags, 'categories' => $categories]);
    }
}
