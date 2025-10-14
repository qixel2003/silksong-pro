<x-alayout>
    <x-slot:heading>
        Item Page
    </x-slot:heading>
    <h2 class="font-bold text-lg text-white">{{ $item['name'] }}</h2>
    <p class="text-white">
        Item description: {{ $item['description'] }}
    </p>
</x-alayout>
