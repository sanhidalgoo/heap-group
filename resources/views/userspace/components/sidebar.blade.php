<nav class="sidebar">
    <div class="sidebar__header">
        <img src="{{ asset('../assets/logo-solid-black.svg') }}" />
    </div>

    <ul class="sidebar__nav list-unstyled components">
        <li class="sidebar__nav-button {{ request()->routeIs('user.home.index') ? 'active' : '' }}">
            <a class="sidebar__link" href="{{ route('user.home.index') }}">{{ __('navigation.home') }}</a>
        </li>
        <li class="sidebar__nav-button {{ request()->routeIs('user.beers.index') ? 'active' : '' }}">
            <a class="sidebar__link" href="{{ route('user.beers.index') }}">{{ __('navigation.beers') }}</a>
        </li>
        @auth
            <li class="sidebar__nav-button {{ request()->routeIs('user.beers.index') ? 'active' : '' }}">
                <a class="sidebar__link" href="{{ route('user.beers.index') }}">{{ __('navigation.orders') }}</a>
            </li>
            <li class="sidebar__nav-button {{ request()->routeIs('user.cart.index') ? 'active' : '' }}">
                <a class="sidebar__link" href="{{ route('user.cart.index') }}">
                    {{ __('navigation.cart') }}
                    @if (isset($viewData['beersInCart']) && count($viewData['beersInCart']) > 0)
                        <span class="sidebar__notification">{{ count($viewData['beersInCart']) }}</span>
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
</nav>