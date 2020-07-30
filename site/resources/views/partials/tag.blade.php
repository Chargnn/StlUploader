<span class="mr-2 text-black p-1 rounded leading-none flex items-center whitespace-no-wrap align-baseline border-r-0" style="background-color: {{ $tag->color }}">
    @if($tag->url)
        <a href="{{ $tag->url }}"><u>{{ $tag->name }}</u></a>
    @else
        {{ $tag->name }}
    @endif

    @if(isset($stl))
        <a href="{{ route('detach_tag') }}?stl_id={{ $stl->id }}&tag_id={{ $tag->id }}" class="pr-1 pl-1 cursor-pointer">✕</a>
    @else
        <a href="{{ route('delete_tag') }}?tag_id={{ $tag->id }}" class="pr-1 pl-1 cursor-pointer">✕</a>
    @endif
</span>
