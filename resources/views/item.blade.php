<x-alayout>
    <x-slot:heading>
        Item Page
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $item['name'] }}</h2>
    <p>
        Item description: {{ $item['description'] }}
    </p>
</x-alayout>
