<x-alayout>
    <x-slot:heading>
        Edit page
    </x-slot:heading>
    <h2 class="font-bold text-lg text-white">{{$item->name}}</h2>
    <p>
{{--        Tags: {{$item->tags->name}}--}}
    </p>
    <div class="text-white">Product description: {{$item->description}}</div>

    <p class="mt-6 text-white">
        <x-button href="{{ route('items.index') }}">Edit</x-button>
    </p>

</x-alayout>
