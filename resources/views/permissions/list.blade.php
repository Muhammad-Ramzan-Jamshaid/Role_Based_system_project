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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
