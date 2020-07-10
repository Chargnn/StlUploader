@extends('modals.layout', ['name' => 'categories', 'title' => 'Add a category'])

@section('body')
    <form class="w-full max-w-lg" method="POST" action="{{ route('create_category') }}">
        {{ csrf_field() }}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categories-title">
                    Title
                </label>
                <input id="categories-title" type="text" name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>

        <div class="flex justify-end pt-2">
            <button type="button" onclick="window.activeModal.toggle();" class="px-4 bg-transparent p-3 rounded-lg text-purple-600 hover:bg-gray-100 hover:text-purple-700 mr-2">Cancel</button>
            <button type="submit" class="px-4 bg-purple-600 p-3 rounded-lg text-white hover:bg-purple-700">Create</button>
        </div>
    </form>
@overwrite
