<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Book Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <form method="POST" action="{{route('book-requests.store')}}">
                @csrf
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="book" class="block text-sm font-medium leading-6 text-gray-900">Book</label>
                      <div class="mt-1">
                          <select name="book" id="book"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Book</option>
                            @foreach ($books as $book)
                                <option 
                                  {{old('book') == $book->id ? 'selected' : ''}}
                                  value="{{$book->id}}"
                                >{{ $book->name}}</option>
                            @endforeach
                          </select>
                      </div>
                      @error('book')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-span-full">
                      <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Borrower</label>
                      <div class="mt-1">
                          <select name="borrower" id="borrower"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Borrower</option>
                             @foreach ($borrowers as $borrower)
                                <option
                                {{old('borrower') == $borrower->id ? 'selected' : ''}}
                                  value="{{$borrower->id}}"
                                >
                                  {{ $borrower->name}}
                                </option>
                            @endforeach
                          </select>
                      </div>
                      @error('borrower')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="col-span-full">
                      <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Comment</label>
                      <div class="mt-1">
                        <textarea id="comment" name="comment" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{old('comment')}}</textarea>
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
