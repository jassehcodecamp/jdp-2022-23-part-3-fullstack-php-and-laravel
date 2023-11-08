<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            
            header {
                background-image: url("/images/bg-header-desktop.svg");

            }

        </style>

        
    </head>
    <body class="antialiased bg-[hsl(180_52%_96%)]">
       <header class="py-[4.5rem]  px-4 bg-teal-400 bg-center bg-no-repeat bg-cover"></header>
       <main class="max-w-7xl mx-auto py-10 px-10">
        <div class="space-y-10">
          <x-job-list-item 
            :job="['company' => ['name' => 'Tritech'] ]" />
          <x-job-list-item 
            :job="['company' => ['name' => 'JCC'] ]" />
          <x-job-list-item 
            :job="['company' => ['name' => 'Pura'] ]" />
          <x-job-list-item 
            :job="['company' => ['name' => 'QCell'] ]" />
            </div>
       </main>
    </body>
</html>
