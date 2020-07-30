@extends('modals.layout', ['name' => 'categories', 'title' => 'Add a category'])

@section('body')
    <form class="w-full max-w-lg" method="POST" action="{{ route('create_cat') }}">
        {{ csrf_field() }}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="categories-title">
                    Title
                </label>
                <input id="categories-title" type="text" name="title" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>

        <div class="flex justify-end pt-2">
            <button type="button" onclick="window.activeModal.toggle();" class="px-4 bg-transparent p-3 rounded-lg text-purple-600 hover:bg-purple-900 hover:text-purple-500 mr-2">Cancel</button>
            <button type="submit" class="px-4 bg-purple-600 p-3 rounded-lg text-white hover:bg-purple-700">Create</button>
        </div>
    </form>

    <div>
        <h4>Existing: </h4>
        <ul>
            @foreach($categories as $category)
                <li>- {{ $category->name }} <a href="{{ route('delete_cat') }}?cat_id={{ $category->id }}" class="text-purple-600">Delete</a></li>
            @endforeach
        </ul>
    </div>
@overwrite
