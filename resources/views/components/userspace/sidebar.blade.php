<a id="sidebar-toggle-close" class="hidden absolute top-0 left-0 h-full w-full z-0 bg-[rgb(0,0,0,0.8)] transition duration-150 ease-in">
</a>
<aside id="sidebar" class="flex transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in">
    <div class="sidebar w-64 bg-[#8B673B]">
        <div class="py-4 px-7">
            <img src="{{ asset('../assets/logo-solid-black.svg') }}" />
        </div>
        <ul class="my-3 flex flex-col w-full">
            @auth
                <li class="leading-none p-0.5 text-sm text-white text-center">
                    <span class="text-lg font-bold">{{ Auth::user()->getName() }}</span> <br/>
                    {{ __('users.cash-available') . ': ' . Auth::user()->getCashAvailable() . ' ' . __('beers.currency') }}
                </li>
            @endauth
            <x-userspace.sidebar-item route="user.home.index">
                {{ __('navigation.home') }}
            </x-userspace.sidebar-item>
            <x-userspace.sidebar-item route="user.beers.index">
                {{ __('navigation.beers') }}
            </x-userspace.sidebar-item>
            <x-userspace.sidebar-item route="user.beers.ranking">
                {{ __('navigation.ranking') }}
            </x-userspace.sidebar-item>
            @auth
                <x-userspace.sidebar-item route="user.orders.index">
                    {{ __('navigation.orders') }}
                </x-userspace.sidebar-item>
                <x-userspace.sidebar-item route="user.cart.index">
                    {{ __('navigation.cart') }}
                    @if (count(session()->get("beers") ?? []) > 0)
                        <span class="absolute px-1 ml-2 bg-white text-xs text-[#8B673B] font-bold rounded-full">
                            {{ count(session()->get("beers")) }}
                        </span>
                    @endif
                </x-userspace.sidebar-item>
            @endauth
            <hr class="mx-2.5 my-2 border text-center" />
            @guest
                <x-userspace.button type="solid" route="login">
                    {{ __('navigation.login') }}
                </x-userspace.button>
                <x-userspace.button type="outlined" route="register">
                    {{ __('navigation.signup') }}
                </x-userspace.button>
            @else
                <x-userspace.form-button type="outlined" route="logout">
                    {{ __('navigation.logout') }}
                </x-userspace.form-button>
            @endguest
        </ul>
    </div>
</aside>
