<x-alayout>
    <x-slot:heading>
        Item Page
    </x-slot:heading>
    <h2 class="font-bold text-lg text-white">{{ $item['name'] }}</h2>
    <p class="text-white">Tag: {{ $item->tags->pluck('name')->join(', ') }}</p>
    <p class="text-white">
        Item description: {{ $item['description'] }}
    </p>
    @auth
        @if (Auth::user()->isAdmin())
            <p class="mt-6">
                <x-button href="{{ route('items.edit', $item->id) }}">
                    Edit
                </x-button>
            </p>
            <p>admin</p>
        @endif
    @endauth

</x-alayout>
