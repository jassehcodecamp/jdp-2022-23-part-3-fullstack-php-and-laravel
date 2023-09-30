<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
   
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                   <h1 class="text-2xl text-gray-600 font-semibold">Larvel 101 - Todos App</h1>
                </div>
                <div class="flex space-x-4 mt-3">
                        <a class="text-blue-500 font-medium underline" href="{{route('todos.index')}}">Active Todos</a>
                        <a class="text-red-500 font-medium underline" href="{{route('todos.index', ['status' => 'deleted'])}}">Deleted Todos</a>
                </div>
                <div class="mt-16">
                  
                  {{ $slot }}
                    
                </div>

                
            </div>
        </div>
    </body>
</html>
