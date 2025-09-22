<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">   
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Roles
            </h2>
            <button class="bg-slate-800 text-white px-5 py-3 font-medium rounded">
                <a href="{{ route('roles.create') }}">Create</a>
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full bg-gray-400">
                <thead>
                    <tr>
                        <th class="text-start border-b px-4 py-3">#</th>
                        <th class="text-start border-b px-4 py-3">Role Name</th>
                        <th class="text-start border-b px-4 py-3">Permissions</th>
                        <th class="text-start border-b px-4 py-3">Created At</th>
                        <th class="text-center border-b px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="w-full bg-white">
                    @if($roles->isNotEmpty())
                        @foreach($roles as $role)
                            <tr>
                                <td class="text-start border-b px-4 py-4">{{ $role->id }}</td>
                                <td class="text-start border-b px-4 py-4">{{ $role->name }}</td>
                                <td class="text-start border-b px-4 py-4">
                                    @if($role->permissions->isNotEmpty())
                                        @foreach($role->permissions as $permission)
                                            <span class="px-2 py-1 bg-gray-200 rounded text-sm">
                                                {{ $permission->name }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="text-gray-500">No permissions</span>
                                    @endif
                                </td>
                                <td class="text-start border-b px-4 py-4">{{ $role->created_at }}</td>
                                <td class="border-b px-4 py-3 flex gap-3 justify-center">
                                    <button class="bg-sky-800 text-white px-5 py-2 font-medium rounded">
                                        <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                    </button>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-800 text-white px-5 py-2 font-medium rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

          
            <div class="my-3"> {{ $roles->links() }} </div>
        </div>
    </div>
</x-app-layout>
