<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('create_cat') }}" class="w-full max-w-lg"  enctype="multipart/form-data">
                @csrf
                <div class="popup_box ">
                    <div class="popup_inner">
                        <h3>Connect</h3>

                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                Title
                                <input id="categories-title" type="text" name="title">
                            </div>

                            <div class="col-xl-12">
                                <button type="submit" class="boxed_btn_green">Enter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div>
                <h4>Existing: </h4>
                <ul>
                    @foreach($categories as $category)
                        <li>- {{ $category->name }} <a href="{{ route('delete_cat') }}?category_id={{ $category->id }}" class="text-purple-600">Delete</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
