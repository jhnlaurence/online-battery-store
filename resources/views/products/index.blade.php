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
                <div class="flex justify-between items-center content-center m-10">
                    <div class="p-1.5 text-gray-900 dark:text-gray-100">
                        Will display all the Product Description here
                        @if(session('mssg'))
                            <div class="alert alert-success">
                                {{ session('mssg') }}
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('products.create') }}"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium
                        rounded-lg text-sm pl-2 pr-2 sm:pr-3 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800
                        flex h-fit">
                        <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 sm:mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                        <p class="hidden sm:inline">Create</p>
                    </a>
                </div>
                <div class="relative">
                    <button class="z-20 text-white flex flex-col shrink-0 grow-0 justify-around 
                                    fixed bottom-0 right-0 right-5 rounded-lg
                                    mr-1 mb-5 lg:mr-5 lg:mb-5 xl:mr-10 xl:mb-10">
                      <div class="p-3 rounded-full border-4 border-white bg-green-600">
                        <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                        </svg>
                      </div>
                  
                    </button>
                  </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="grid grid-cols-7 text-center content-center">
                                <th scope="col" class="flex items-center justify-center px-6 py-3 col-span-1">
                                    Stock
                                </th>
                                <th scope="col" class="flex items-center justify-center px-6 py-3 col-span-3 sm:col-span-2">
                                    Product Name
                                </th>
                                <th scope="col" class="flex items-center justify-center px-6 py-3 col-span-1">
                                    Product Size
                                </th>
                                <th scope="col" class="items-center justify-center px-6 py-3 col-span-1 hidden md:flex">
                                    Warranty
                                </th>
                                <th scope="col" class="items-center justify-center px-6 py-3 col-span-2 md:col-span-1 hidden sm:flex">
                                    Price
                                </th>
                                <th scope="col" class="flex items-center justify-center px-6 py-3 col-span-2 sm:col-span-1">
                                    Update
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($batteries as $battery)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 grid grid-cols-7 text-center">
                                <td class="px-6 py-4 col-span-1 flex justify-center items-center">
                                    {{ $battery['stock'] }}
                                </td>
                                <td class="px-6 py-4 flex justify-center items-center col-span-3 sm:col-span-2">
                                    {{ strtoupper($battery['brand_name']) }}
                                </td>
                                <td class="px-6 py-4 flex justify-center items-center col-span-1">
                                    {{ strtoupper($battery['size']) }}
                                </td>
                                <td class="px-6 py-4 col-span-1 justify-center items-center hidden md:inline">
                                    {{ $battery['month_warranty'] }} Months
                                </td>
                                <td class="px-6 py-4 col-span-2 md:col-span-1 justify-center items-center hidden sm:inline">
                                    Php {{ $battery['price'] }}.00
                                </td>
                                <td class="px-6 py-2 col-span-2 sm:col-span-1 flex items-center justify-center">

                                    <a href="{{ route('products.show', $battery->id) }}"
                                        class="-me-2 flex justify-center items-center h-full md:hidden w-fit">
                                        <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="md:hidden w-5 h-5"> <!-- Show on small screens -->
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"></path>
                                        </svg>
                                    </a>

                                    <a href="{{ route('products.show', $battery->id) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                                        rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hidden md:inline
                                        h-fit">
                                        Update<!-- Hide on small screens -->
                                    </a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
