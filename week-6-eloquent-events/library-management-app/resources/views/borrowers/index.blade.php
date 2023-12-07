<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Borrowers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class="px-4">
                    <div class="sm:flex sm:items-center">
                      <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Borrowers</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the Borrowers in the Library including their Name, Email, Phone and Address.</p>
                      </div>
                      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{route('borrowers.create')}}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Borrower</a>
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
                                
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                  
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                                   
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Address</th>

                                  <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Books Count</th>
                                  
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Added By</th>
                                  
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                                  
                                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Actions</span>
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($borrowers as $borrower)
                                <tr>
                                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$borrower->name}}</td>

                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $borrower->email}}</td>
                                  
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $borrower->phone}}</td>
                                  
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $borrower->address}}</td>
                                  
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">{{ $borrower->books->count()}}</td>
                                  
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ optional($borrower->user)->name ?? 'N/A' }}</td>
                                  
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $borrower->created_at}}</td>
                                
                                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                  </td>
                                </tr>
                                @endforeach
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
