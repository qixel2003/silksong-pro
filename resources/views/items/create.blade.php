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
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-white">Name</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 px-3 pl-1 text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" placeholder="my wood" value="{{old('name')}}" required>
                            </div>
                            @error('name')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <label for="tag_id" class="block text-sm/6 font-medium text-white">Tags</label>
                    <div class="mt-2">
                        <select id="tag_id" name="tag_id" class="block w-full rounded-md border-0 bg-transparent py-1.5 px-3 text-whitering-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-insetfocus:ring-indigo-600 sm:text-sm/6">
                            <option value="">-- Select a tag --</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                    <div>
                        <div class="col-span-full">
                            <label for="description" class="block text-sm/6 font-medium text-white">About</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3" value="{{old('description')}}" class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required></textarea>
                            </div>
                            @error('description')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                            @enderror
                            <p class="mt-3 text-sm/6 text-white">Write a item description.</p>
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

