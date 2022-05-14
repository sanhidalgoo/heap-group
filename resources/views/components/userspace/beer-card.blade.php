@props(['beer', 'beersInCart', 'cardProps' => ''])

<div class="bg-white flex px-2 py-4 shadow-md rounded h-full {{ $cardProps }}">
    <div class="w-2/4 overflow-hidden">
        <img src="{{ $beer->getURL() }}" class="w-full h-72 max-w-max object-cover object-right">
    </div>
    <div class="flex flex-col justify-between">
        <p class="h4 font-bold">{{ $beer->getName() }}</p>
        <p>
            {{ $beer->getIngredient() }}
            <i>From {{ $beer->getOrigin() }}</i>
        </p>
        <p>{{ $beer->getFormat() }}</p>
        <p>
            <strong class="h5 font-bold">{{ $beer->getPrice() . ' ' . __('beers.currency') }}</strong>
        </p>
        <div class="m-4 text-center text-amber-500">
            <div>
                <span class="fa fa-star {{ $beer->getRating() >= 0.5 ? 'checked' : '' }}"></span>
                <span class="fa fa-star {{ $beer->getRating() >= 1.5 ? 'checked' : '' }}"></span>
                <span class="fa fa-star {{ $beer->getRating() >= 2.5 ? 'checked' : '' }}"></span>
                <span class="fa fa-star {{ $beer->getRating() >= 3.5 ? 'checked' : '' }}"></span>
                <span class="fa fa-star {{ $beer->getRating() >= 4.5 ? 'checked' : '' }}"></span>
            </div>
            <p class="font-bold text-lg text-center">{{$beer->getRating()}}</p>
        </div>

        <x-userspace.button color="primary outlined" route="user.beers.show" :params="['id' => $beer->getId()]">
            {{ __('beers.details') }}
        </x-userspace.button>

        @auth
            @if (array_key_exists($beer->getId(), $beersInCart))
                <x-userspace.form-button color="danger solid" route="user.cart.remove" :params="['id' => $beer->getId()]">
                    {{ __('cart.remove.button') }}
                </x-userspace.form-button>
            @else
                <x-userspace.form-button color="success solid" route="user.cart.add" :params="['id' => $beer->getId()]">
                    {{ __('cart.add.button') }}
                </x-userspace.form-button>
            @endif
        @endauth
    </div>
</div>
