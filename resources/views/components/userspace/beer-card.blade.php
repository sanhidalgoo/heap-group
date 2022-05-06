@props(['beer', 'beersInCart'])

<div class="bg-white flex px-3 py-2 shadow-md rounded h-full">
    <div class="w-2/4 overflow-hidden">
        <img src="{{ $beer->getURL() }}" class="w-full h-64 max-w-max object-cover object-right">
    </div>
    <div class="px-0 py-2">
        <p class="h4 font-bold">{{ $beer->getName() }}</p>
        <p>
            {{ $beer->getIngredient() }}
            <i>From {{ $beer->getOrigin() }}</i>
        </p>
        <p>{{ $beer->getFormat() }}</p>
        <p><strong class="h5 font-bold">{{ $beer->getPrice() . ' ' . __('beers.currency') }}</strong>
        </p>
        <div class="m-4 text-center">
            <span class="fa fa-star {{ $beer->getRating() >= 0.5 ? 'checked' : '' }}"></span>
            <span class="fa fa-star {{ $beer->getRating() >= 1.5 ? 'checked' : '' }}"></span>
            <span class="fa fa-star {{ $beer->getRating() >= 2.5 ? 'checked' : '' }}"></span>
            <span class="fa fa-star {{ $beer->getRating() >= 3.5 ? 'checked' : '' }}"></span>
            <span class="fa fa-star {{ $beer->getRating() >= 4.5 ? 'checked' : '' }}"></span>
        </div>

        <x-userspace.button listed="FALSE" route="user.beers.show" :params="['id' => $beer->getId()]">
            {{ __('beers.details') }}
        </x-userspace.button>

        @auth
            @if (array_key_exists($beer->getId(), $beersInCart))
                <x-userspace.form-button listed="FALSE" route="user.cart.remove" :params="['id' => $beer->getId()]">
                    {{ __('cart.remove.button') }}
                </x-userspace.form-button>
            @else
                <x-userspace.form-button listed="FALSE" route="user.cart.add" :params="['id' => $beer->getId()]">
                    {{ __('cart.add.button') }}
                </x-userspace.form-button>
            @endif
        @endauth
    </div>
</div>
