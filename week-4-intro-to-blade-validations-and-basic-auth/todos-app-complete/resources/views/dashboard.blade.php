<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    <!-- {{ route('todos.store') }} -->
    {{-- route('todos.store') --}}
    <div>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="description" class="block mb-1 text-sm text-gray-600">Todo Description</label>
                <input
                    value="{{old('description')}}" 
                    type="text" 
                    placeholder="Work on my current PHP Project" 
                    id="description" 
                    name="description" 
                    class="text-sm text-gray-700 border border-gray-300 py-2.5 px-3 rounded w-full">
                @error('description')
                    <span class="block mt-0.5 text-sm text-red-500">{{ $message }}</span>
                @enderror
                
            </div>
            {{-- {{ var_dump($errors)}} --}}
            {{-- @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach --}}

            {{-- <button class="text-sm font-semibold bg-blue-500 text-gray-50 py-2.5 px-5 rounded">Submit</button> --}}
            <x-primary-button>Save</x-primary-button>
        </form>
    </div>
    <hr class="my-4">

    <h2 class="capitalize">{{ $status }} Todos</h2>

    <div class="">
        <div class="bg-white py-4 px-6 rounded">
            <ul class="space-y-4 divide divide-gray-300">
                @foreach($todos as $todo)
                <li class="text-gray-600 text-sm flex items-center justify-between space-x-6">
                    <div class="space-x-1 flex items-center">
                        @if ($status != 'deleted')
                        <form action="#">
                            <input type="checkbox" name="completed" id="completed">
                        </form>
                        @endif
                        <p>{{ $todo->description }}</p>
                    </div>
                    <div class="space-x-1.5 flex items-center">
                        @if ($status != 'deleted')
                        
                        <x-secondary-button as="link" href="{{ route('todos.edit', $todo->id)}}">Edit</x-secondary-button>
                        
                        <form method="POST" action="{{route('todos.delete', $todo->id)}}">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>Delete</x-danger-button>
                        </form>
                        @else
                        <form method="POST" action="{{route('todos.restore', $todo->id)}}">
                            @csrf
                            @method('PATCH')
                            <x-restore-button>Restore</x-restore-button>
                        </form>
                        @endif
                        
                    </div>
                </li>
                @endforeach

                
                
                
            </ul>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
