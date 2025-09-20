<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{  route('permissions.store')  }}" method="POST">
                    @csrf
                      <label for="" class="text-lg font-medium">Name</label>
                    <div class="my-3">
                        <input type="text" name="name" class="border-grey-300 shadow-sm w-1/2 rounded-lg">
                       @if(session('success'))
                        <p class="text-green-600 font-medium">{{ session('success') }}</p>
                         @endif
                    </div>
                    <button class="bg-blue-600 p-3 mt-3 rounded-lg text-white ">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
