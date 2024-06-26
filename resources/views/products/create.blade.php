{{-- ? Will be a form in creating a new product or an update in the stocks
    Should have the following:

    * 1. A Form on top.
    *   Product name
    *   Warranty
    *   Price
    *   Description
    *   Image upload
    
    * 2. a while table that will display everything. (No need to create a grid).
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('products.index') }}">{{ __('Products') }}</a> / {{ __('Create') }}
        </h2>
    </x-slot>

    <!-- component -->
<div class="mt-10 lg:mt-40 p-6 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-800 dark:text-gray-200 leading-tight">
                        <p class="font-medium text-lg">New Battery Information</p>
                        <p>Please fill out all the fields.</p>
                    </div>
                    
                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="product" class="text-gray-800 dark:text-gray-200 leading-tight">Battery Brand</label>
                                <input type="text" name="product" id="product"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                placeholder="Yokohama / Motolite / Dyna"/>
                            </div>
            
                            <div class="md:col-span-5">
                                <label for="size" class="text-gray-800 dark:text-gray-200 leading-tight">Battery Size</label>
                                <input type="text" name="size" id="size"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                placeholder="1SM / 2SM / 3SM"/>
                            </div>
            
                            <div class="md:col-span-2">
                                <label for="warranty" class="text-gray-800 dark:text-gray-200 leading-tight">Battery Warranty</label>
                                <input type="number" name="warranty" id="warranty"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                placeholder="Warranty Duration" />
                            </div>
            
                            <div class="md:col-span-2 relative">
                                <label for="price" class="text-gray-800 dark:text-gray-200 leading-tight">Price</label>
                                <input type="number" name="price" id="price" class="h-10 border mt-1 rounded pl-11 w-full bg-gray-50" value="" />
                                <span class="absolute inset-y-0 left-0 flex items-center text-md justify-center pl-2 pt-6 text-black">Php</span>
                            </div>
            
                            <div class="md:col-span-1">
                                <label for="stock" class="text-gray-800 dark:text-gray-200 leading-tight">Stock</label>
                                <input type="number" name="stock" id="stock"
                                class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="0" value="" />
                            </div>
                    
                            <div class="md:col-span-5 text-right mt-10">
                                <div class="inline-flex items-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>

</x-app-layout>