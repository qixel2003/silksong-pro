<x-alayout>
    <x-slot:heading>
        Create page
    </x-slot:heading>
    {{--    <h1>create </h1>--}}
    <form method="POST" action="/items">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-white">Create new item</h2>
                <p class="mt-1 text-sm/6 text-white">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name" >Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input-label name="name" id="name" autocomplete="name" placeholder="wood sword" value="{{old('name')}}" required></x-form-input-label>
                            <x-form-error name="name" />
                        </div>
                    </x-form-field>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-label for="tag_id" >Tags</x-form-label>
                    <x-form-field>
                            @foreach ($tags as $tag)
                                <option class="text-black" value="{{ $tag->id }}">{{ $tag->name }} </option>
                            @endforeach
                            <select name="tag_id[]" id="tag_id" multiple class="block w-full rounded-md border-0 bg-transparent py-1.5 px-3 text-white ring-1 ring-inset ring-white focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>

                        <x-form-error name="tag_id" />
                    </x-form-field>

                </div>
                    <div>
                        <div class="col-span-full">
                            <x-form-label for="description" >Description</x-form-label>
                            <p class="mt-3 text-sm/6 text-white">Write a item description.</p>
                            <x-form-field>
                                <textarea id="description" name="description" rows="3" value="{{old('description')}}" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required></textarea>
                            </x-form-field>
                            <x-form-error name="description" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
    </form>
</x-alayout>

