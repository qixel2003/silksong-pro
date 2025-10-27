<x-alayout>
    <x-slot:heading>
        Items Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($items as $item)
            <a class="text-lg text-white block px-4 py-6 border border-gray-200 rounded-lg"
               href="{{ route('items.show', $item->id) }}">
                <div class="font-bold text-sm">
{{--                    <p>{{ $item->tags->pluck('name')->join(', ') }}</p>--}}
                    <p>Tags:</p>

{{--                    <div class="flex flex-wrap gap-2 mt-1">--}}
                        @foreach ($item->tags as $tag)
                            <span class="text-white text-xs px-2 py-1 rounded-full">
                                {{ $tag->name }}
                            </span>
                        @endforeach
{{--                    </div>--}}

                </div>

                <div>
                    <strong>{{ $item->name }}:</strong> Description {{ $item->description }}
                </div>
            </a>
        @endforeach
    </div>
</x-alayout>
