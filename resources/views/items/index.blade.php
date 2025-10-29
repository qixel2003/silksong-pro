<x-alayout>
    <x-slot:heading>
        Items Page
    </x-slot:heading>

    <form method="GET" action="{{ route('items.index') }}" class="mb-6 flex gap-4">
        <!-- Search -->
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search by name..."
               class="rounded-md px-3 py-2 w-1/2 text-black">

        <!-- Filter by Tag -->
        <select name="tag" class="rounded-md px-3 py-2 text-black">
            <option value="">All Tags</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>

        <button type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-500">
            Apply
        </button>
    </form>
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
