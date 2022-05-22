<a id="sidebar-toggle-close"
    class="hidden absolute top-0 left-0 h-full w-full z-10 bg-[rgb(0,0,0,0.8)] transition duration-150 ease-in">
</a>
<aside id="sidebar"
    class="flex transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in z-10">
    <div class="sidebar w-64 bg-[#8B673B]">
        <div class="py-4 px-7">
            <img src="{{ asset('../assets/logo-solid-black.svg') }}" />
        </div>
        <ul class="my-3 flex flex-col w-full">
            @auth
                <li class="leading-none p-0.5 text-sm text-white text-center">
                    <span class="text-lg font-bold">{{ Auth::user()->getName() }}</span> <br />
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
            <x-userspace.sidebar-item route="user.home.allies">
                {{ __('navigation.allies') }}
            </x-userspace.sidebar-item>
            @auth
                <x-userspace.sidebar-item route="user.orders.index">
                    {{ __('navigation.orders') }}
                </x-userspace.sidebar-item>
                <x-userspace.sidebar-item route="user.cart.index">
                    {{ __('navigation.cart') }}
                    @if (count(session()->get('beers') ?? []) > 0)
                        <span class="absolute px-1 ml-2 bg-white text-xs text-[#8B673B] font-bold rounded-full">
                            {{ count(session()->get('beers')) }}
                        </span>
                    @endif
                </x-userspace.sidebar-item>
            @endauth
            <hr class="mx-2.5 my-2 border text-center" />
            @guest
                <li>
                    <x-userspace.button color="primary solid" route="login">
                        {{ __('navigation.login') }}
                    </x-userspace.button>
                </li>
                <li>
                    <x-userspace.button color="primary outlined" route="register">
                        {{ __('navigation.signup') }}
                    </x-userspace.button>
                </li>
            @else
                <li>
                    <x-userspace.form-button color="danger solid" route="logout">
                        {{ __('navigation.logout') }}
                    </x-userspace.form-button>
                </li>
            @endguest
            <div class="flex justify-around">
                <a href="{{ route('user.locale', ['locale' => 'es']) }}"> <img
                        src="https://i.pinimg.com/originals/6d/58/03/6d5803a761b49785361bdf6789212e36.png" alt="es"
                        width="30px" /></a>

                <a href="{{ route('user.locale', ['locale' => 'en']) }}"> <img
                        src="https://cleandye.com/wp-content/uploads/2020/01/English-icon.png" alt="es"
                        width="30px" /></a>
            </div>
        </ul>
    </div>
</aside>
