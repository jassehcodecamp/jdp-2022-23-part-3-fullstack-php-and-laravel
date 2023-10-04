<x-app-layout>
     <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Todo
            </h2>
            <x-secondary-button>
                <a href="{{ url()->previous() }}">Back</a>
            </x-secondary-button>
        </div>
    </x-slot>
    <div class="mt-6 py-4">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl w-full mx-auto bg-white  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="description" class="block mb-1 text-sm text-gray-600">Todo Description</label>
                            <input 
                                type="text" 
                                placeholder="Work on my current PHP Project" 
                                id="description" 
                                name="description"
                                value="{{ $todo->description }}" 
                                class="text-sm text-gray-700 border border-gray-300 py-2.5 px-3 rounded w-full">
                        </div>

                        <x-primary-button>Update</x-primary-button>
                    </form>
                </div>
            </div>
        </div>               
    </div>               
</x-app-layout>