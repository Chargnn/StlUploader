<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <nav class="flex w-full items-center justify-around bg-purple-600 p-4">
            <button class="text-white w-auto modal-open p-2" data-modal-name="upload">
                <span class="material-icons align-middle">
                cloud_upload
                </span>
                Upload
            </button>
            <button class="text-white w-auto modal-open p-2" data-modal-name="tags">
                <span class="material-icons align-middle">
                label
                </span>
                Tags
            </button>
            <button class="text-white w-auto modal-open p-2" data-modal-name="categories">
                <span class="material-icons align-middle">
                all_inbox
                </span>
                Categories
            </button>
            <button class="text-white w-auto">
                <span class="material-icons align-middle">
                accessibility
                </span>
                Builder
            </button>

            <form method="GET" class="w-3/4">
                <label for="search" class="hidden">Search</label>
                <input id="search" name="search" type="text" placeholder="Keywords, category" class="shadow appearance-none bg-purple-700 rounded py-2 px-3 text-gray-200 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-300 w-full">
            </form>
        </nav>

        <div class="my-1 px-1 w-full sm:w-1/2 md:w-1/4 lg:my-4 lg:px-4 lg:w-1/5">
            <article class="overflow-hidden rounded-lg shadow-lg">
                <a href="#">
                    <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random">
                </a>
                <header class="p-2 md:p-4">
                    <div class="flex items-center justify-between leading-tight">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#">
                                Article Title
                            </a>
                        </h1>
                        <p class="text-grey-darker text-sm">
                            <small>Uploaded on: 11/1/19</small>
                        </p>
                    </div>
                    <hr class="w-full mt-2 mb-2">
                    <h4>
                        In: <i>Category, Category</i>
                    </h4>
                </header>

                <footer class="leading-none p-2 md:p-4">
                    <div>
                        <button class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <span class="material-icons">arrow_circle_down</span>
                            <span class="ml-2">Download</span>
                        </button>
                    </div>
                    <hr class="w-full mt-5 mb-5">
                    <div class="flex items-start flex-row justify-start text-xs">
                        <span class="mr-2 bg-blue-600 text-white p-1 rounded leading-none flex items-center whitespace-no-wrap align-baseline border-r-0">
                            Notifications
                            <span class="pr-1 pl-1 cursor-pointer">✕</span>
                        </span>
                        <span class="mr-2 bg-blue-600 text-white p-1 rounded leading-none flex items-center whitespace-no-wrap align-baseline border-r-0">
                            <u>Notifications</u>
                            <span class="pr-1 pl-1 cursor-pointer">✕</span>
                        </span>
                    </div>
                </footer>
            </article>
        </div>

        @include('modals.upload')
        @include('modals.tags')
        @include('modals.categories')

        <script src="{{ asset('js/app.js') }}"></script>
   </body>
</html>
