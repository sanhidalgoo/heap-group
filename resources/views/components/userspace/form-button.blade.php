@props(['listed' => 'TRUE', 'type' => 'solid', 'route', 'params' => []])

@if($listed == 'TRUE')
    @if($type == 'solid')
        <li class="transition hover:transition mx-3.5 my-1 rounded-md bg-[#604028] hover:bg-[#2b1e14] text-center text-white">
            <form method="POST" action="{{ route($route, $params) }}" class="font-bold w-full h-full">
                @csrf
                <button type="submit" class="inline-block py-3 rounded-md w-full h-full">
                    {{ $slot }}
                </button>
            </form>
        </li>
    @elseif($type == 'outlined')
        <li class="transition hover:transition mx-3.5 my-1 rounded-md bg-white text-center border-4 border-[#604028] hover:border-[#2b1e14] text-[#604028] hover:text-[#2b1e14]">
            <form method="POST" action="{{ route($route, $params) }}" class="w-full h-full">
                @csrf
                <button type="submit" class="inline-block py-3 rounded-md font-bold w-full h-full">
                    {{ $slot }}
                </button>
            </form>
        </li>
    @endif
@else
    @if($type == 'solid')
        <div class="transition hover:transition mx-3.5 my-1 rounded-md bg-[#604028] hover:bg-[#2b1e14] text-center text-white">
            <form method="POST" action="{{ route($route, $params) }}" class="font-bold w-full h-full">
                @csrf
                <button type="submit" class="inline-block py-3 rounded-md w-full h-full">
                    {{ $slot }}
                </button>
            </form>
        </div>
    @elseif($type == 'outlined')
        <div class="transition hover:transition mx-3.5 my-1 rounded-md bg-white text-center border-4 border-[#604028] hover:border-[#2b1e14] text-[#604028] hover:text-[#2b1e14]">
            <form method="POST" action="{{ route($route, $params) }}" class="w-full h-full">
                @csrf
                <button type="submit" class="inline-block py-3 rounded-md font-bold w-full h-full">
                    {{ $slot }}
                </button>
            </form>
        </div>
    @endif
@endif
