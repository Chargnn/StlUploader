<div class="modal fade" id="tagsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('create_tag') }}" class="w-full max-w-lg"  enctype="multipart/form-data">
                @csrf
                <div class="popup_box ">
                    <div class="popup_inner">
                        <h3>Connect</h3>

                        <div class="row">
                            <div class="col-xl-12 col-md-12">
                                Title
                                <input id="tags-title" type="text" name="title">
                            </div>

                            <div class="col-xl-12 col-md-12">
                                Url
                                <input id="tags-url" type="text" name="url">
                            </div>

                            <div class="col-xl-12 col-md-12">
                                <div class="color-picker" acp-palette-editable>
                                    <input type="hidden" name="color" id="tags-color" value="#FF0000" />
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <button type="submit" class="boxed_btn_green">Enter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @if(count($tags))
                <hr class="w-full mt-5 mb-5">
                @foreach($tags as $tag)
                    @include('partials.tag')
                @endforeach
            @endif
        </div>
    </div>
</div>

