<?php

namespace App\Http\Controllers;

class StlController extends Controller
{
    public function create()
    {
        var_dump(request()->all());
        die;
    }
}
