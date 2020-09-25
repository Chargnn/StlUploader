<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('create_stl') }}" class="w-full max-w-lg"  enctype="multipart/form-data">
                @csrf
                <div class="popup_box ">
                    <div class="popup_inner">
                        <h3>Connect</h3>

                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                Title
                                <input id="upload-title" type="text" name="title">
                            </div>
                            <div class="col-xl-12 col-md-12">
                                Attach tags
                                <select multiple id="upload-tags" name="tags[]" class="form-control">
                                    @foreach($tags as $tag)
                                        <option style="background-color: {{ $tag->color }};" value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 col-md-12">
                                Attach categories
                                <select multiple id="upload-categories" name="categories[]" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-12 col-md-12">
                                File URL
                                <input type='text' class="hidden" name="file" />
                            </div>
                            <div class="col-xl-12 col-md-12">
                                Image URL
                                <input type='text' class="hidden" name="image" />
                            </div>
                            <div class="col-xl-12">
                                <button type="submit" class="boxed_btn_green">Enter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
