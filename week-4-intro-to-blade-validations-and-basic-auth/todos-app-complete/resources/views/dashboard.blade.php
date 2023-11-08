<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-end">
                        <h2 class="capitalize">{{ $status }} Todos</h2>
                        <x-primary-button class="py-3">
                            <a href="/todos/create">Create Todo</a>
                        </x-primary-button>
                    </div>

                    <div class="mt-3">
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
