{{-- ? Will be a form in creating a new product or an update in the stocks
    Should have the following:
    
    * 2. a table that will display everything. (No need to create a grid).
    * This iwll have a button on the side that will have edit on it.
    * will also have add product on top right. (will redirect to the order index)
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div>
                        Will display all the Product Description here
                    </div>
                </div>
                <button onclick="window.location='{{ route('products.create') }}'">Update</button>
                <button onclick="window.location='{{ route('products.create') }}'">Create</button>
            </div>
        </div>
    </div>
</x-app-layout>
