@if (count($breadcrumbs))
<div class="mx-8 my-3">
    <ol class="flex flex-row">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="text-[#604028]">&nbsp;<a class="font-semibold" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a> &gt;</li>
            @else
                <li class="font-bold">&nbsp;{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
</div>
@endif
