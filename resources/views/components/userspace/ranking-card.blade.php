@props(['index', 'beer', 'beersInCart'])

<div class="flex flex-row items-center shadow-md rounded-md my-8 {{ $index == 1 ? 'bg-[#604028] text-white' : 'bg-white' }} {{ $index % 2 == 0 ? 'md:-mr-14 md:ml-24' : 'md:-ml-14 md:mr-24'}}">
    <div class="flex-grow ml-5 {{ $index == 1 ? 'bg-[#604028] text-white' : 'bg-white' }} {{ $index % 2 == 0 ? 'md:ml-8' : 'md:ml-20'}}">
        <p class="font-bold text-9xl {{ $index == 1 ? 'text-white' : 'text-[#604028]' }}">{{ $index }}</p>
    </div>
    <div class="flex-grow-[2]">
        <x-userspace.beer-card
            cardProps="shadow-none mr-5 {{ $index == 1 ? 'bg-[#604028] text-white' : '' }} {{ $index % 2 == 0 ? 'md:mr-20' : ''}}"
            :beer="$beer"
            :beersInCart="$beersInCart"
        />
    </div>
</div>
