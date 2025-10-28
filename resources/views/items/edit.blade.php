<x-alayout>
    <x-slot:heading>
        Edit Item: {{$item->name}}
    </x-slot:heading>
    {{--    <h1>create </h1>--}}
    <form method="POST" action="{{ route('items.show', $item->id) }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-white">Edit Item</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="name">Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input-label name="name" id="name" autocomplete="name" placeholder="wood sword"
                                                value="{{$item->name}}" required></x-form-input-label>
                            <x-form-error name="name"/>
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <div class="col-span-full">
                            <x-form-label for="description">Description</x-form-label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3"
                                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                          placeholder="{{$item->description}}" value="{{$item->description}}"
                                          required></textarea>
                            </div>
                            <x-form-error name="description"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-between gap-x-6">
                <div class="flex items-center">
                    <button form="delete-form" class="text-red-500 txt-sm font-bold">Delete</button>
                </div>
                <div class="flex items-center gap-x-6">
                    <a href="{{ route('items.show', $item->id) }}" type="button"
                       class="text-sm/6 font-semibold text-white">Cancel</a>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form method="Post" action="{{ route('items.show', $item->id) }}" id="delete-form" class="hidden">
        @csrf
        @method('Delete')
    </form>
</x-alayout>

