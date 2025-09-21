<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">   
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Permissions /  Create
        </h2>
        <button  class="bg-slate-800 text-white px-5 py-3 font-medium rounded">
            <a href="{{route('permissions.index')}}">Back to Listinig</a></button>
</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="{{  route('permissions.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="Name" class="text-lg font-medium">Name</label>
                        <div class="my-4">
                           <input type="text" placeholder="Enter name" name="name" class="border-grey-300 shadow-sm w-1/2 rounded">
                        @error('name')
                        <p class="text-red-400">{{$message}}</p>
                        @enderror
                        </div>

                        <button class="bg-slate-600 text-white rounded p-3">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
