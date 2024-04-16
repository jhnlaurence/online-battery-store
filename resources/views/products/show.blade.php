
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('products.index') }}">{{ __('Products') }}</a> / {{ __('Update') }}
        </h2>
    </x-slot>

    <div class="mt-10 lg:mt-20 lg:p-6 flex items-center justify-center">
        <div class="max-w-screen-sm mx-auto">
            <form action="{{ route('products.update', $battery->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-sm flex flex-col ">
                            <div class="text-gray-800 dark:text-gray-200 leading-tight">
                                <div class="flex mb-10 justify-left items-center">
                                    <a href="{{ route('products.index') }}">
                                        <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                    </a>
                                    <p class="font-medium text-lg ml-2">Update Battery Information</p>
                                </div>
                                
                                
                                <h1 class="mt-3 text-3xl font-large font-bold">
                                    {{ strtoupper($battery['size']) }} - {{ strtoupper($battery['brand_name']) }}
                                </h1>
                            </div>
                            <div class="text-sm mt-5">
                                <div class="md:col-span-2">
                                    <label for="warranty" class="text-gray-800 dark:text-gray-200 leading-tight">
                                        Battery Warranty (Months)
                                    </label>
                                    <input type="number" name="warranty" id="warranty"
                                        class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                        value="{{ $battery['month_warranty'] }}"
                                        placeholder="Warranty Duration" />
                                    
                                </div>
                                @error('warranty')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                
                                <div class="relative mt-2">
                                    <label for="price" class="text-gray-800 dark:text-gray-200 leading-tight">
                                        Price </label>
                                    <input type="number" name="price" id="price"
                                        class="h-10 border mt-1 rounded pl-11 w-full bg-gray-50"
                                        value="{{ $battery['price'] }}" />
                                    <span class="absolute inset-y-0 left-0 flex items-center text-md justify-center pl-2 pt-6 text-black">
                                        Php </span>
                                </div>
                                @error('price')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                
                                <div class="mt-2">
                                    <label for="stock" class="text-gray-800 dark:text-gray-200 leading-tight">Stock</label>
                                    <input type="number" name="stock" id="stock"
                                    class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    placeholder="0" value="{{ $battery['stock'] }}" />
                                    
                                </div>
                                @error('stock')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                        
                                <div class="text-left md:text-right mt-10">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        type="submit"> Submit </button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
      </div>    

</x-app-layout>
