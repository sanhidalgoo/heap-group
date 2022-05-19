@props(['route'])

<li class="p-0 relative text-xl sm:text-lg text-center cursor-pointer text-white {{ request()->routeIs($route) ? 'bg-[#312318] font-bold' : '' }}">
    <a class="block py-3 w-100 h-100 hover:text-white {{ request()->routeIs($route) ? 'hover:bg-[#2b1e14]' : 'hover:bg-[#604028]' }}" href="{{ route($route) }}">
        {{ $slot }}
    </a>
</li>
