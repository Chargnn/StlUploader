<?php

namespace App\Http\Controllers;

use App\Tag;

class TagController extends Controller
{
    public function create()
    {
        $tag = new Tag();
        $tag->user_id = 1;
        $tag->name = request('title');
        $tag->color = request('color');
        $tag->save();

        return redirect(route('index'));
    }
}
