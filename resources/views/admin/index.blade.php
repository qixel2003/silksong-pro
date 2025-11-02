<x-alayout>
    <x-slot:heading>
        🛠️ Admin Dashboard
    </x-slot:heading>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('admin.index') }}" class="mb-6 flex flex-wrap gap-2 items-center">
        <input
            type="text"
            name="search"
            placeholder="Search by name or title..."
            value="{{ request('search') }}"
            class="border rounded p-2 text-black w-60"
        >

        <select name="status" class="border rounded p-2 text-black">
            <option value="">All Status</option>
            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
        </select>

        <x-fbutton>Filter</x-fbutton>
        <a href="{{ route('admin.index') }}" class="ml-2 text-sm text-gray-300 underline">Reset</a>
    </form>

    <h2 class="text-2xl text-white font-semibold mb-3">👥 Users</h2>
    <div class="overflow-x-auto mb-10">
        <table class="w-full border border-gray-700 text-white">
            <thead class="bg-gray-800">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr class="border-b border-gray-700">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">
                            <span class="{{ $user->status ? 'text-green-400' : 'text-red-400' }}">
                                {{ $user->status ? 'Active' : 'Inactive' }}
                            </span>
                    </td>
                    <td class="p-3">
                        <form method="POST" action="{{ route('admin.user.toggle', $user->id) }}" onsubmit="return confirm('Are you sure you want to toggle this user?')">
                            @csrf
                            @method('PATCH')
                            <x-fbutton>
                                {{ $user->status ? 'Deactivate' : 'Activate' }}
                            </x-fbutton>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $users->links() }}</div>
    </div>

    <h2 class="text-2xl text-white font-semibold mb-3">🏗️ Builds</h2>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-700 text-white">
            <thead class="bg-gray-800">
            <tr>
                <th class="p-3 text-left">Title</th>
                <th class="p-3 text-left">User</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($builds as $build)
                <tr class="border-b border-gray-700">
                    <td class="p-3">{{ $build->title }}</td>
                    <td class="p-3">{{ $build->user->name ?? 'Unknown' }}</td>
                    <td class="p-3">
                            <span class="{{ $build->status ? 'text-green-400' : 'text-red-400' }}">
                                {{ $build->status ? 'Active' : 'Inactive' }}
                            </span>
                    </td>
                    <td class="p-3">
                        <form method="POST" action="{{ route('admin.build.toggle', $build->id) }}" onsubmit="return confirm('Are you sure you want to toggle this build?')">
                            @csrf
                            @method('PATCH')
                            <x-fbutton>
                                {{ $build->status ? 'Deactivate' : 'Activate' }}
                            </x-fbutton>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $builds->links() }}</div>
    </div>
</x-alayout>
