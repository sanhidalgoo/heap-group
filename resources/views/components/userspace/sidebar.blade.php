<a id="sidebar-toggle-close" class="hidden absolute top-0 left-0 h-full w-full z-0 bg-[rgb(0,0,0,0.8)] transition duration-150 ease-in">
</a>
<aside id="sidebar" class="flex transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in">
    <div class="sidebar w-64 bg-[#8B673B]">
        <div class="py-4 px-7">
            <img src="{{ asset('../assets/logo-solid-black.svg') }}" />
        </div>
        <ul class="my-4 flex flex-col w-full">
            @auth
                <li class="sidebar__nav-description">
                    {{ Auth::user()->getName() }} <br/>
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
                <x-userspace.sidebar-item route="user.beers.ranking">
                    {{ __('navigation.ranking') }}
                </x-userspace.sidebar-item>
                <li class="sidebar__nav-button {{ request()->routeIs('user.orders.index') ? 'active' : '' }}">
                    <a class="sidebar__link" href="{{ route('user.orders.index') }}">{{ __('navigation.orders') }}</a>
                </li>
                <li class="sidebar__nav-button {{ request()->routeIs('user.cart.index') ? 'active' : '' }}">
                    <a class="sidebar__link" href="{{ route('user.cart.index') }}">
                        {{ __('navigation.cart') }}
                        @if (count(session()->get("beers") ?? []) > 0)
                            <span class="sidebar__notification">{{ count(session()->get("beers")) }}</span>
                        @endif
                    </a>
                </li>
            @endauth
            <hr class="sidebar__hr" />
            @guest
                <li class="button button--solid button--flex-end" id="login">
                    <a class="sidebar__link" href="{{ route('login') }}">{{ __('navigation.login') }}</a>
                </li>
                <li class="button button--outlined button--flex-end" id="signup">
                    <a class="sidebar__link" href="{{ route('register') }}">{{ __('navigation.signup') }}</a>
                </li>
            @else
                <li class="button button--outlined button--flex-end" id="logout">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                        @csrf
                        <button type="submit" class="sidebar__link">
                            {{ __('navigation.logout') }}
                        </button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</aside>
