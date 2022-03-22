<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-2">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('user.home.index') }}">{{ __('messages.title') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link px-3 {{ request()->routeIs('user.home.index') ? 'active' : '' }}" href="{{ route('user.home.index') }}">{{ __('navigation.home') }}</a>
                <a class="nav-link px-3 {{ request()->routeIs('user.beers.index') ? 'active' : '' }}" href="{{ route('user.beers.index') }}">{{ __('navigation.beers') }}</a>
                <a class="nav-link px-3 {{ request()->routeIs('user.cart.index') ? 'active' : '' }}" href="#">{{ __('navigation.cart') }}</a>
                <a class="nav-link px-3 {{ request()->routeIs('login') ? 'active' : '' }}" href="#">{{ __('navigation.login') }}</a>
            </div>
        </div>
    </div>
</nav>
<header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
        <h2>@yield('subtitle', __('messages.welcome'))</h2>
    </div>
</header>
