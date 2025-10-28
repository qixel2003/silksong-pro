<x-alayout>
    <x-slot:heading>
        Builds Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($builds as $build)
            <a class="text-lg text-white block px-4 py-6 border border-gray-200 rounded-lg"
               href="{{ route('builds.show', $build->id) }}">
                <div>
                    <strong>{{ $build->title }}:</strong> Description {{ $build->content }}
                </div>
            </a>
        @endforeach
    </div>
</x-alayout>
