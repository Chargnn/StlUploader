<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Stl manager">

        <title>Stl manager</title>

        <link href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}" rel="stylesheet">
        <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>

        <header>
            <div class="header-area ">
                <div id="sticky-header" class="main-header-area">
                    <div class="container-fluid p-0">
                        <div class="row align-items-center no-gutters">
                            <div class="col-xl-2 col-lg-2">
                            </div>
                            <div class="col-xl-7 col-lg-7">
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                @guest
                                    <div class="log_chat_area d-flex align-items-center" style="cursor: pointer">
                                        <span data-toggle="modal" data-target="#loginModal" class="login popup-with-form">
                                            <span class="material-icons">
                                                person
                                            </span>
                                            <span>Admin access</span>
                                        </span>
                                    </div>
                                @endguest
                                @auth
                                    <div class="log_chat_area d-flex align-items-center">
                                        <span class="login popup-with-form">
                                            <span class="material-icons">
                                                person
                                            </span>
                                            <span>{{ Auth::user()->name }}</span>
                                        </span>
                                    </div>

                                    <div class="log_chat_area d-flex align-items-center" style="cursor: pointer">
                                        <span data-toggle="modal" data-target="#uploadModal" class="login popup-with-form">
                                            <span>Add STL</span>
                                        </span>
                                    </div>

                                    <div class="log_chat_area d-flex align-items-center" style="cursor: pointer">
                                        <span data-toggle="modal" data-target="#tagsModal" class="login popup-with-form">
                                            <span>Add Tags</span>
                                        </span>
                                    </div>

                                    <div class="log_chat_area d-flex align-items-center" style="cursor: pointer">
                                        <span data-toggle="modal" data-target="#categoriesModal" class="login popup-with-form">
                                            <span>Add Categories</span>
                                        </span>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="slider_area shadow-lg">
            <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1 overlay2">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-9 p-5">
                            <div class="slider_text text-center">
                                <h3>Search</h3>
                                <div class="find_dowmain">
                                    <form method="GET" action="#results" class="find_dowmain_form">
                                        <input type="text" name="search" placeholder="Patreon, Keyword, Tags.." value="{{ request('search') }}">
                                        <button type="submit">
                                            <span class="material-icons">search</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center mt-5">
            <div class="row">
                <div class="list-group list-group-horizontal">
                    @foreach($categories as $category)
                        <a href="?search={{ $category->name }}" class="list-group-item list-group-item-action {{ request('search') === $category->name ? 'list-group-item-primary' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="prising_area" id="results">
            <div class="container">
                @if(count($stls) > 0)
                    <div class="card-deck">
                        @foreach($stls as $stl)
                            <div class="card shadow-sm">
                                <iframe class="card-img-top" src="{{ $stl->img_path }}"></iframe>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $stl->name }}</h5>
                                    <p class="card-text">
                                        @if(count($stl->categories))
                                            Categories:
                                            @foreach($stl->categories as $category)
                                                <span>{{ $category->name }}</span>
                                            @endforeach
                                        @endif
                                        <br>

                                        @if(count($stl->tags))
                                            @foreach($stl->tags as $tag)
                                                @include('partials.tag')
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ $stl->file_path }}">
                                        <div class="btn btn-outline-success">
                                            Download <span class="material-icons vertical-align-middle">arrow_circle_down</span>
                                        </div>
                                    </a>
                                    @auth
                                        <a href="{{ route('delete_stl') }}?stl_id={{ $stl->id }}">
                                            <div class="btn btn-outline-danger">
                                                Delete
                                            </div>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section_title text-center mb-100">
                                <h3>
                                    Nothing.
                                </h3>
                                @if(!empty(request('search')))
                                    <p>Query for "{{ request('search') }}" didn't find anything</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <footer class="footer shadow-lg">
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                                Donate with BTC: bc1qnkpkv9hakgergzewrdxlv3skfq05lmkqnzlhxr | Version: {{ \Tremby\LaravelGitVersion\GitVersionHelper::getVersion() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        @include('modals.login')
        @include('modals.upload')
        @include('modals.tags')
        @include('modals.categories')

        <script src="{{ asset('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}"></script>
    </body>
</html>
