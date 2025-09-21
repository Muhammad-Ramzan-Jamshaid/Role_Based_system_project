<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
        <button  class="bg-slate-800 text-white px-5 py-3 font-medium rounded">
            <a href="{{route('permissions.create')}}">Create</a></button>
</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <x-message></x-message>
            <table class="w-full bg-gray-400">
                <thead>
                    <tr>
                        <th class="text-start border-b px-4 py-3">#</th>
                        <th class="text-start border-b px-4 py-3">Name</th>
                        <th class="text-start border-b px-4 py-3">Created_at</th>
                        <th class="text-center border-b px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="w-full bg-white">
                    @if($permissions -> isNotEmpty())
                    @foreach($permissions as $permission)
                    <tr>
                        <td class="text-start border-b px-4 py-4 text-">{{$permission->id}}</td>
                        <td class="text-start border-b px-4 py-4">{{$permission->name}}</td>
                        <td class="text-start border-b px-4 py-4">{{$permission->created_at}}</td>
                        <td class="text-center border-b px-4" > <button  class="bg-sky-800 text-white px-5 py-2 font-medium rounded">
                        <a href="{{route('permissions.edit',$permission->id)}}">Edit</a></button>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
                    </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>


            <div class="my-3"> {{$permissions->Links()}}</div>
           
            <!-- this is used for adding paging  -->
        </div>
    </div>
</x-app-layout>
