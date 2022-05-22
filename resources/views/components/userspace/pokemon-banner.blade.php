@props(['pokemon'])

<div class="bg-danger"
    style="background-image: url(https://c4.wallpaperflare.com/wallpaper/957/704/964/pokemon-fields-ruby-1920x1200-nature-fields-hd-art-wallpaper-preview.jpg); background-size: contain; padding: 10px 0">
    <p class="text-center">
        <strong>{{ __('pokemon.title') }}</strong>
    </p>
    <p class="text-center">
        {{ __('pokemon.description') }}
    </p>
    <img class="w-100 mx-auto d-block" src="{{ $pokemon['sprites']['front_default'] }}" alt="main-photo">
    <p class="text-center">
        <strong>{{ $pokemon['name'] }}</strong>
    </p>

</div>
