<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Borrower') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <form method="POST" action="{{route('borrowers.store')}}">
                @csrf
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                      <div class="mt-1">
                          <input 
                            type="text" 
                            name="name" 
                            id="name"
                            value="{{old('name')}}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                      @error('name')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="col-span-full">
                      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                      <div class="mt-1">
                          <input 
                            type="email" 
                            name="email"
                            id="email"
                            value="{{old('email')}}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                      @error('email')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="col-span-full">
                      <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                      <div class="mt-1">
                          <input 
                            type="text" 
                            name="phone" 
                            id="phone"
                            value="{{old('phone')}}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                      @error('phone')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="col-span-full">
                      <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                      <div class="mt-1">
                        <textarea id="address" name="address" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{old('textarea')}}</textarea>
                      </div>
                    </div>
                   

                  </div>
                  <div class="mt-6 flex items-center justify-end gap-x-5">
                    <button type="button" class="text-sm font-semibold rounded-md bg-gray-50 text-gray-900 border px-6 py-2.5">Reset</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
