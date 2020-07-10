<?php

namespace App\Http\Controllers;

class TagController extends Controller
{
    public function create()
    {
        var_dump(request()->all());
        die;
    }
}
