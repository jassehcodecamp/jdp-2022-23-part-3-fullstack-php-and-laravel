<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class="px-4">
                    <div class="sm:flex sm:items-center">
                      <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Authors</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the Book Authors in the System including their name, and brief biography.</p>
                      </div>
                      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="/authors/create" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Author</a>
                      </div>
                    </div>
                    <div class="mt-8 flow-root">
                      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Biography</th>
                                  <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Total Books</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Added By</th>
                                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Actions</span>
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($authors as $author)
                                <tr>
                                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$author->name}}</td>
                                  <td class="max-w-[20rem] truncate whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $author->biography}}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">{{ $author->books->count() }}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $author->created_at}}</td>
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $author->user->name }}</td>
                                
                                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                  </td>
                                </tr>
                                @endforeach
                                <!-- More people... -->
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
