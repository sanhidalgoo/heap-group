@props(['type' => 'solid', 'route', 'params' => []])

@if($type == 'solid')
    <li class="transition hover:transition mx-3.5 my-1 rounded-md bg-[#604028] hover:bg-[#2b1e14] text-center font-bold text-white">
        <a class="block py-3 rounded-md w-full h-full" href="{{ count($params) == 0 ? route($route) : route($route, $params) }}">
            {{ $slot }}
        </a>
    </li>
@elseif($type == 'outlined')
    <li class="transition hover:transition mx-3.5 my-1 rounded-md bg-white text-center font-bold border-4 border-[#604028] hover:border-[#2b1e14] text-[#604028] hover:text-[#2b1e14]">
        <a class="block py-3 rounded-md w-full h-full" href="{{ count($params) == 0 ? route($route) : route($route, $params) }}">
            {{ $slot }}
        </a>
    </li>
@endif
