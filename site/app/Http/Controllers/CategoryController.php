<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;

class CategoryController extends Controller
{
    public function create()
    {
	    $category = new Category();
	    $category->user_id = 1;
	    $category->name = request('title');
	    $category->save();

        return redirect(route('index'));
    }

    public function delete()
    {
        /** @var Category $category */
        $category = Category::find(request('category_id'));
	    $category->delete();

        return redirect()->back();
    }
}
