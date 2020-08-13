@if($tag->url)
    <a href="{{ $tag->url }}" target="_blank">
@endif
<span class="badge badge-primary" style="background-color: {{ $tag->color }};">
    {{ $tag->name }}

    @if(!isset($stl))
        <a href="{{ route('delete_tag') }}?tag_id={{ $tag->id }}" class="pr-1 pl-1 cursor-pointer">✕</a>
    @endif
</span>
@if($tag->url)
    </a>
@endif
