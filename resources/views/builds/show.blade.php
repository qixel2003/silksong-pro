<x-alayout>
    <x-slot:heading>
        Build Page
    </x-slot:heading>
    <h2 class="font-bold text-lg text-white">{{ $build['title'] }}</h2>
    <p class="text-white">
        Build description: {{ $build['content'] }}
    </p>
    <ul class="list-disc list-inside text-white">
        @foreach ($build->items as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ul>
@can('edit-build', $build)
        <p class="mt-6">
            <x-button href="{{ route('builds.edit', $build->id) }}">
                Edit
            </x-button>
        </p>
    @endcan
</x-alayout>
