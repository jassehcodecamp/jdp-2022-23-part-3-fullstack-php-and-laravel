<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">Book Requests Summary</h3>
            <dl class="mt-2.5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                
                <x-stat-box title="Today's Requests" value="10" />
                <x-stat-box title="Pending Return" value="20" />
                <x-stat-box title="Total Books" value="105" />
                
            </dl>
            </div>
            <div class="mt-12">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Recent Request</h3>
           
              <div class="mt-2.5 flow-root">
                      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                              <thead class="bg-gray-50">
                                <tr>
                                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Book</th>
                                
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Borrower</th> 
                                  
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Processed By</th>
                                
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                                 
                                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Actions</span>
                                  </th>
                                </tr>
                              </thead>
                              <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($bookRequests as $bookRequest)
                                <tr>
                                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$bookRequest->book->name}}</td>
                                  
                                   <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $bookRequest->borrower->name}}</td>
                                  
                                  
                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ optional($bookRequest->user)->name ?? 'N/A' }}</td>

                                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $bookRequest->created_at}}</td>
                                
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
</x-app-layout>
