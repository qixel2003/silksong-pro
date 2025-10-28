<x-alayout>
    <x-slot:heading>
        Item Page
    </x-slot:heading>
    <h2 class="font-bold text-lg text-white">{{ $build['title'] }}</h2>
    <p class="text-white">
        Build description: {{ $build['content'] }}
    </p>

    {{--    @can()--}}
    <p class="mt-6">
        <x-button href="{{ route('builds.edit', $build->id) }}">
            Edit
        </x-button>
    </p>
    {{--    @endcan--}}
</x-alayout>
