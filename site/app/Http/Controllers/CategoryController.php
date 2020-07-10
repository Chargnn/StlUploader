<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function create()
    {
        var_dump(request()->all());
        die;
    }
}
