<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <form 
                method="POST" 
                action="{{route('books.store')}}" 
                enctype="multipart/form-data"
              >
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
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="PHP & MySQL Web Development Book">
                      </div>
                      @error('name')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="col-span-full">
                      <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Cover Image</label>
                      <div class="mt-1">
                          <input 
                            type="file" 
                            name="image" 
                            id="image"
                            value="{{old('image')}}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Select Book cover image">
                      </div>
                      @error('image')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>

                    <div class="col-span-full">
                      <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                      <div class="mt-1">
                        <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{old('description')}}</textarea>
                      </div>
                    </div>
                    <div class="col-span-full">
                      <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                      <div class="mt-1">
                          <select name="category_id" id="category"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option 
                                  {{old('category_id') == $category->id ? 'selected' : ''}}
                                  value="{{$category->id}}"
                                >{{ $category->name}}</option>
                            @endforeach
                          </select>
                      </div>
                      @error('category_id')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="col-span-full">
                      <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Author</label>
                      <div class="mt-1">
                          <select name="author_id" id="author"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Select Author</option>
                             @foreach ($authors as $author)
                                <option
                                {{old('author_id') == $author->id ? 'selected' : ''}}
                                  value="{{$author->id}}"
                                >
                                  {{ $author->name}}
                                </option>
                            @endforeach
                          </select>
                      </div>
                      @error('author_id')
                          <p class="text-sm text-rose-500 mt-1">{{ $message }}</p>
                      @enderror
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
