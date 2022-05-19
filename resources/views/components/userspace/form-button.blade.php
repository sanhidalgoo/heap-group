@props(['color' => 'primary solid', 'route', 'params' => []])

@if(str_contains($color, "primary"))
    @if(str_contains($color, "solid"))
        @php($color = "bg-[#604028] border-[#604028] text-white hover:bg-[#2b1e14] hover:border-[#2b1e14]")
    @elseif(str_contains($color, "outlined"))
        @php($color = "bg-white border-[#604028] hover:border-[#2b1e14] text-[#604028] hover:text-[#2b1e14]")
    @endif
@elseif(str_contains($color, "success"))
    @if(str_contains($color, "solid"))
        @php($color = "bg-lime-700 border-lime-700 text-white hover:bg-lime-800 hover:border-lime-800")
    @elseif(str_contains($color, "outlined"))
        @php($color = "bg-white border-lime-700 text-lime-700 hover:border-lime-800 hover:text-lime-800")
    @endif
@elseif(str_contains($color, "danger"))
    @if(str_contains($color, "solid"))
        @php($color = "bg-red-600 border-red-600 text-white hover:bg-red-700 hover:border-red-700")
    @elseif(str_contains($color, "outlined"))
        @php($color = "bg-white border-red-600 text-red-600 hover:border-red-700 hover:text-red-700")
    @endif
@endif

<div class="transition hover:transition mx-4 my-1 border-4 rounded-md text-center {{ $color }}">
    <form method="POST" action="{{ route($route, $params) }}" class="w-full h-full">
        @csrf
        <button type="submit" class="inline-block py-2 rounded-md font-bold w-full h-full">
            {{ $slot }}
        </button>
    </form>
</div>
