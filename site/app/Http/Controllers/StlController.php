<?php

namespace App\Http\Controllers;

use App\Category;
use App\StlModel;
use App\Tag;

class StlController extends Controller
{
    public function create()
    {
        $stl = new StlModel();
        $stl->name = request('title');
        $stl->user_id = 1;
        $stl->file_path = '';
        $stl->img_path = '';
        $stl->save();

        if (request('file')) {
            $filePath = request('file');
            $fileName = $filePath->getClientOriginalName();
            $path = request('file')->storeAs('uploads', $fileName, 'public');

            $stl->file_path = $path;
            $stl->save();
        }

        if (request('image')) {
            $imgPath = request('image');
            $imgName = $imgPath->getClientOriginalName();
            $path = request('image')->storeAs('images', $imgName, 'public');

            $stl->img_path = $path;
            $stl->save();
        }

        $tags = request('tags');
        foreach ($tags as $tag) {
            $stl->tags()->attach($tag);
        }

        $categories = request('categories');
        foreach ($categories as $category) {
            $stl->categories()->attach($category);
        }

        return redirect(route('index'));
    }

    public function detachTag()
    {
        /** @var StlModel $stl */
        $stl = StlModel::find(request('stl_id'));
        $tag = Tag::find(request('tag_id'));
        $stl->tags()->detach($tag);
        $stl->save();

        return redirect()->back();
    }

    public function detachCategory()
    {
        /** @var StlModel $stl */
        $stl = StlModel::find(request('stl_id'));
        $category = Category::find(request('cat_id'));
        $stl->categories()->detach($category);
        $stl->save();

        return redirect()->back();
    }

    public function delete()
    {
        $stl = StlModel::find(request('stl_id'));
        $stl->delete();

        return redirect()->back();
    }
}
