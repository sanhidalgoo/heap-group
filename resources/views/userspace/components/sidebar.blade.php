<nav class="sidebar">
    <div class="sidebar__header">
        <img src="{{ asset('../assets/logo-solid-black.svg') }}" />
    </div>

    <ul class="sidebar__nav list-unstyled components">
        <li class="sidebar__nav-button {{ request()->routeIs('user.home.index') ? 'active' : '' }}">
            <a class="sidebar__link" href="{{ route('user.home.index') }}">Home</a>
        </li>
        <li class="sidebar__nav-button {{ request()->routeIs('user.beers.index') ? 'active' : '' }}">
            <a class="sidebar__link" href="{{ route('user.beers.index') }}">Beers</a>
        </li>
        @auth
            <li class="sidebar__nav-button {{ request()->routeIs('user.beers.index') ? 'active' : '' }}">
                <a class="sidebar__link" href="{{ route('user.beers.index') }}">Orders</a>
            </li>
            <li class="sidebar__nav-button {{ request()->routeIs('user.beers.index') ? 'active' : '' }}">
                <a class="sidebar__link" href="{{ route('user.beers.index') }}">Shopping Cart</a>
            </li>
        @endauth
        <hr class="sidebar__hr" />
        @guest
            <li class="button button--solid button--flex-end" id="login">
                <a class="sidebar__link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="button button--outlined button--flex-end" id="signup">
                <a class="sidebar__link" href="{{ route('register') }}">Signup</a>
            </li>
        @else
            <li class="button button--outlined button--flex-end" id="signup">
                <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                    @csrf
                    <button type="submit" class="sidebar__link">
                        Logout
                    </button>
                </form>
            </li>
        @endguest
    </ul>
</nav>
