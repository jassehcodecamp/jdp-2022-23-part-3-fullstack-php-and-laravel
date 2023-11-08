<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-end">
                        <h2 class="capitalize font-semibold text-gray-600">{{ $status }} Todos: <span class="font-semibold">{{ $todos->count() }}</span></h2>
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
                                        <x-dropdown-link 
                                            :href="route(
                                                'todos.index', 
                                                ['status' => 'completed']
                                            )">
                                           Completed Todos
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('todos.index', ['status' => 'deleted'])">
                                           Deleted Todos
                                        </x-dropdown-link>

                                       
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>

                    {{-- todo complete alert --}}
                    <x-todo-completed-alert />

                    {{-- todo incompleted alert --}}
                    <x-todo-incompleted-alert />
                    
                    @if(session('todo_deleted_permanent'))
                    <div class="rounded-md bg-red-50 p-4 mt-3">
                    <div class="flex">
                        <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        </div>
                        <div class="ml-3">
                        <p class="text-sm font-medium text-red-800"> {{session('todo_deleted_permanent')}}</p>
                        </div>
                        <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <a href="{{ route('todos.index')}}" class="inline-flex rounded-md bg-red-50 p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 focus:ring-offset-red-50">
                            <span class="sr-only">Dismiss</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                    @endif

                    <div class="mt-3">
                        <div class="bg-white py-4 px-6 rounded">
                            <ul class="space-y-4 divide divide-gray-300">
                                @foreach($todos as $todo)
                                <li class="text-gray-600 text-sm flex items-center justify-between space-x-6">
                                    <div class="space-x-1 flex items-center">
                                        @if ($status != 'deleted')
                                        <form method="POST" action="{{ route('todos.complete',  $todo->id)}}" class="complete-todo">
                                            @csrf
                                            @method('PATCH')
                                            <input 
                                                type="checkbox" 
                                                name="completed" 
                                                id="completed"
                                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                {{ $todo->completed ? 'checked' : ''}}
                                            >
                                        </form>
                                        @endif
                                        <p class="{{$todo->completed ? 'line-through' : ''}}">{{ $todo->description }}</p>
                                    </div>
                                    <div class="space-x-1.5 flex items-center">
                                        @if ($status == 'active')
                                        
                                        <x-secondary-button as="link" href="{{ route('todos.edit', $todo->id)}}">Edit</x-secondary-button>
                                        
                                        <form method="POST" action="{{route('todos.delete', $todo->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Delete</x-danger-button>
                                        </form>
                                        @elseif($status == 'completed')
                                        <form method="POST" action="{{route('todos.delete-permanent', $todo->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Delete Permanently</x-danger-button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{route('todos.restore', $todo->id)}}">
                                            @csrf
                                            @method('PATCH')
                                            <x-restore-button>Restore</x-restore-button>
                                        </form>

                                        <form method="POST" action="{{route('todos.delete-permanent', $todo->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Delete Permanently</x-danger-button>
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

    @push('scripts')
        <script>
            const completeTodoForms = document.querySelectorAll('.complete-todo');
            completeTodoForms.forEach(form => {
                form.addEventListener('click', () => {
                    form.submit();
                })
            }) 
        </script>
    @endpush

</x-app-layout>
