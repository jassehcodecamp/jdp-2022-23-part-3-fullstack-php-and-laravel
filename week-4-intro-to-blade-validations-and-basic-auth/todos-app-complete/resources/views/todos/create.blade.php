<x-layouts.app>
    <div>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="description" class="block mb-1 text-sm text-gray-600">Todo Description</label>
                <input type="text" placeholder="Work on my current PHP Project" id="description" name="description" class="text-sm text-gray-500 border border-gray-300 py-2.5 px-3 rounded w-full">
            </div>

            <button class="text-sm font-semibold bg-blue-500 text-gray-50 py-2.5 px-5 rounded">Submit</button>
        </form>
    </div>
                   
</x-layouts.app>