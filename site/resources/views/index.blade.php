<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Stl manager">

        <title>Stl manager</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body class="bg-purple-1000">
        <nav class="flex w-full items-center justify-around bg-purple-900 p-4 shadow-xl">
            <button class="text-white w-auto modal-open p-2" data-modal-name="tags">
                <span class="material-icons align-middle">
                label
                </span>
                Tags
            </button>
            <button class="text-white w-auto p-2">
                <span class="material-icons align-middle">
                accessibility
                </span>
                Builder
            </button>

            <form method="GET" class="w-3/4">
                <label for="search" class="hidden">Search</label>
                <input id="search" name="search" type="text" placeholder="Keywords, category" class="shadow appearance-none bg-purple-700 rounded py-2 px-3 text-gray-200 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-300 w-full shadow-md">
            </form>
        </nav>

        <div class="my-1 px-1 ml-2 flex content-start flex-row flex-wrap">
            <button data-modal-name="categories" class="modal-open bg-purple-1000 w-auto font-bold py-2 px-2 mb-2 mr-1 mt-2 rounded inline-flex items-center border-dashed border-4 border-gray-600 hover:shadow-xl hover:border-gray-500 hover:text-gray-500 text-gray-600 cursor-pointer">
                    <span class="material-icons">
                        add_circle
                    </span>
            </button>
            @foreach($categories as $category)
                <button class="bg-purple-900 hover:bg-purple-800 text-white font-bold py-2 px-2 m-2 mr-1 rounded inline-flex items-center">
                    <a href="#" class="mr-1">{{ $category->name }}</a>
                    <a href="{{ route('delete_cat') }}?cat_id={{ $category->id }}">✕</a>
                </button>
            @endforeach
        </div>

        <div class="my-1 px-1 flex content-start flex-wrap flex-row bg-purple-1000">
            <article data-modal-name="upload" class="modal-open overflow-hidden rounded-lg inline ml-2 border-dashed border-4 border-gray-600 hover:shadow-xl hover:border-gray-500 hover:text-gray-500 text-gray-600 cursor-pointer" style="min-height: 300px; min-width: 300px;">
                <div class="mx-auto h-full flex justify-center items-center">
                    <span class="material-icons">
                        add_circle
                    </span>
                </div>
            </article>

            @foreach($stls as $stl)
                <article class="overflow-hidden rounded-lg inline ml-2 sm:w-1/2 md:w-1/4 lg:my-4 lg:px-4 lg:w-1/5 text-white">
                    <a href="{{ asset('storage/' . $stl->file_path) }}">
                        <img alt="Placeholder" class="block mt-2 h-auto w-full" src="{{ asset('storage/' . $stl->img_path) }}">
                    </a>
                    <header>
                        <div class="flex items-center justify-between leading-tight">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline" href="{{ asset('storage/' . $stl->file_path) }}">
                                    {{ $stl->name }}
                                </a>
                            </h1>
                            <p class="text-sm">
                                <small>Uploaded on: {{ date('Y/m/d H:i', strtotime($stl->created_at)) }}</small>
                                <br>
                                <small>Last update: {{ date('Y/m/d H:i', strtotime($stl->updated_at)) }}</small>
                            </p>
                        </div>
                        <div class="mb-1">
                            @if(count($stl->categories))
                                In:
                                <i>
                                   @foreach($stl->categories as $category)
                                       <span>{{ $category->name }} <a href="{{ route('detach_cat') }}?stl_id={{ $stl->id }}&cat_id={{ $category->id }}" class="pr-1 cursor-pointer">✕</a></span>
                                    @endforeach
                                </i>
                            @endif
                        </div>
                    </header>

                    <footer class="leading-none">
                        <div>
                            <a href="{{ asset('storage/' . $stl->file_path) }}">
                                <button class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-3 mb-2 rounded inline-flex items-center">
                                    <span class="material-icons">arrow_circle_down</span>
                                </button>
                            </a>
                            <a href="{{ route('delete_stl') }}?stl_id={{ $stl->id }}">
                                <button class="bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-3 mb-2 rounded inline-flex items-center">
                                    <span class="material-icons">delete_sweep</span>
                                </button>
                            </a>
                        </div>
                        @if(count($stl->tags))
                            <div class="flex items-start flex-row justify-start text-xs">
                                @foreach($stl->tags as $tag)
                                    @include('partials.tag')
                                @endforeach
                            </div>
                        @endif
                    </footer>
                </article>
            @endforeach
        </div>

        @include('modals.upload')
        @include('modals.tags')
        @include('modals.categories')

        <script src="{{ asset('js/app.js') }}"></script>
   </body>
</html>
