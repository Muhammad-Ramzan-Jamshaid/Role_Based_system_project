<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">   
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles / Edit
            </h2>
            <button class="bg-slate-800 text-white px-5 py-3 font-medium rounded">
                <a href="{{ route('roles.index') }}">Back to Listing</a>
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form -->
                    <form action="{{ route('roles.update',$roles->id) }}" method="POST">
                        @csrf
                           @method('PUT')

                        <div>
                            <!-- Role Name -->
                            <label for="name" class="text-lg font-medium">Role Name</label>
                            <div class="my-4">
                                <input 
                                    type="text" 
                                    placeholder="Enter role name" 
                                    name="name" 
                                    value="{{ old('name',$roles->name)   }}"
                                    class="border-gray-300 shadow-sm w-1/2 rounded px-3 py-2"
                                >
                                @error('name')
                                    <p class="text-red-400 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Permissions List -->
                            <label class="text-lg font-medium">Assign Permissions</label>
                            <div class="grid grid-cols-4 my-4 gap-3">
                            @if($permissions->isNotEmpty())
                            @foreach($permissions as $permission)
                                        <div class="flex items-center gap-2">
                                            <input {{($haspermissions->contains($permission->name)) ?  'checked': '' }}
                                                type="checkbox" 
                                                id="permission-{{ $permission->id }}" 
                                                value="{{ $permission->name }}" 
                                                name="permissions[]"
                                                class="rounded"
                                            >
                                            <label for="permission-{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="col-span-4 text-gray-500">No permissions available.</p>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="bg-slate-600 text-white rounded p-3">
                                update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
