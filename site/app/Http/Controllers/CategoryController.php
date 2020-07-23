<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function create()
    {
        $cat = new Category();
        $cat->user_id = 1;
        $cat->name = request('title');
        $cat->save();

        return redirect(route('index'));
    }

    public function delete()
    {
        /** @var Category $cat */
        $cat = Category::find(request('cat_id'));
        $cat->delete();

        return redirect()->back();
    }
}
