<x-alayout>
    <x-slot:heading>
        Create Build
    </x-slot:heading>

    <form method="POST" action="{{ route('builds.store') }}">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-white">Create a new build</h2>
                <p class="mt-1 text-sm/6 text-white">Provide the details for your new build.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="titel">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input-label name="titel" id="titel" autocomplete="off" placeholder="Example: Fire Mage Build" value="{{ old('titel') }}" required />
                            <x-form-error name="titel" />
                        </div>
                    </x-form-field>
                </div>

                <div class="mt-10">
                    <x-form-label for="content">Description</x-form-label>
                    <p class="mt-3 text-sm/6 text-white">Write a detailed description for your build.</p>
                    <x-form-field>
                        <textarea id="content" name="content" rows="4" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required>{{ old('content') }}</textarea>
                    </x-form-field>
                    <x-form-error name="content" />
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-label for="item_id">Select Items</x-form-label>
                    <x-form-field>
                        <select name="item_id[]" id="item_id" multiple
                                class="block w-full rounded-md border-0 bg-transparent py-1.5 px-3 text-white ring-1 ring-inset ring-white focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <x-form-error name="item_id" />
                    </x-form-field>
                </div>

                {{-- Status checkbox --}}
{{--                <div class="mt-6 flex items-center gap-x-3">--}}
{{--                    <input id="status" name="status" type="checkbox" value="1" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>--}}
{{--                    <label for="status" class="text-sm text-white">Active</label>--}}
{{--                </div>--}}

            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('builds.index') }}" class="text-sm/6 font-semibold text-white">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-alayout>
