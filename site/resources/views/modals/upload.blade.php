@extends('modals.layout', ['name' => 'upload', 'title' => 'Upload file'])

@section('body')
    <form class="w-full max-w-lg" method="post" enctype="multipart/form-data" action="{{ route('create_stl') }}">
        {{ csrf_field() }}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="upload-title">
                    Title
                </label>
                <input id="upload-title" type="text" name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="upload-tags">
                    Attach tags
                </label>
                <div class="relative">
                    <select multiple id="upload-tags" name="tags[]" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach($tags as $tag)
                            <option style="background-color: {{ $tag->color }};" value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="upload-categories">
                    Attach categories
                </label>
                <div class="relative">
                    <select multiple id="upload-categories" name="categories[]" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="flex w-full pt-3 items-center justify-center bg-grey-lighter">
            <label class="w-64 flex flex-col items-center px-4 py-6 bg-purple-600 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-700 hover:text-white">
                <span class="text-base leading-normal">Select a file</span>
                <input type='file' class="hidden" name="file" />
            </label>
            <label class="w-64 flex flex-col items-center px-4 py-6 bg-purple-600 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-700 hover:text-white">
                <span class="text-base leading-normal">Select an image</span>
                <input type='file' class="hidden" name="image" />
            </label>
        </div>

        <div class="flex justify-end pt-2">
            <button type="button" onclick="window.activeModal.toggle();" class="px-4 bg-transparent p-3 rounded-lg text-purple-600 hover:bg-gray-100 hover:text-purple-700 mr-2">Cancel</button>
            <button type="submit" class="px-4 bg-purple-600 p-3 rounded-lg text-white hover:bg-purple-700">Upload</button>
        </div>
    </form>
@overwrite
