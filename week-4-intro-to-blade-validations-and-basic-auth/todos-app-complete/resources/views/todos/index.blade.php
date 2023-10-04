<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-end">
                        <h2 class="capitalize">{{ $status }} Todos</h2>
                        <div class="flex space-x-4">
                            <x-primary-button class="py-3">
                                <a href="/todos/create">Create Todo</a>
                            </x-primary-button>

                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                            <div>Filter Todos</div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('todos.index')">
                                           Active Todos
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('todos.index', ['status' => 'deleted'])">
                                           Deleted Todos
                                        </x-dropdown-link>

                                       
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
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
