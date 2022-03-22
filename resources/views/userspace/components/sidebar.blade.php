<nav class="sidebar">
    <div class="sidebar__header">
        <img src="https://image.shutterstock.com/image-vector/vintage-craft-beer-logo-wheat-260nw-1112383865.jpg" />
    </div>

    <ul class="sidebar__nav list-unstyled components">
        <li class="sidebar__nav-button {{ request()->routeIs('user.home.index') ? 'active' : '' }}">
            <a class="sidebar__link" href="{{ route('user.home.index') }}">Home</a>
        </li>
        <li class="sidebar__nav-button {{ request()->routeIs('user.beers.index') ? 'active' : '' }}">
            <a class="sidebar__link" href="{{ route('user.beers.index') }}">Beers</a>
        </li>
        <hr class="sidebar__hr" />
        <li class="button button--solid button--flex-end" id="login">
            <a class="sidebar__link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="button button--outlined button--flex-end" id="signup">
            <a class="sidebar__link" href="{{ route('register') }}">Signup</a>
        </li>
    </ul>
</nav>
