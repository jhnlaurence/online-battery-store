<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="relative flex min-h-screen flex-col overflow-hidden py-6 sm:py-12">
        <div class="mx-auto max-w-screen-xl px-4 w-full">
          <h2 class="mb-4 font-bold text-xl text-gray-600">Current orders</h2>
          @if(session('noStockError'))
          <div class="hover:red-yellow-500 w-full mb-2 select-none border-l-4 border-red-400 bg-red-100 p-3 font-medium flex justify-between">
            <div>
                {{ session('noStockError') }}
            </div>
            <a href="#" onclick="location.reload();">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                </svg>
            </a>
          </div>
          @endif
          <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">
            
            @foreach ($orders as $order)
            
            <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                <a href="" >
                    <div class="hover:text-white absolute z-30 top-0 right-0 mt-2 mr-2 bg-white py-.5 px-2 w-fit rounded-xl">
                        <h3 class="text-lg font-medium text-black">{{ $order->id }}</h3>
                    </div>
                    
                    <div class="h-auto overflow-hidden">
                        <div class="h-44 overflow-hidden relative">
                            <img src="https://picsum.photos/400/400" alt="">
                        </div>
                    </div>
                
                    <div class="bg-white py-4 px-3">
                        {{-- Showing the Created_at date of the order --}}
                        <div class="flex flex-col justify-between">
                            <p>Ordered by: {{ $order->created_at->format('M d-h:i A') }}</p>
                            <h3 class="text-lg font-medium text-black">{{ $order->product->size }} {{ $order->product->brand_name }}</h3>
                            <p class="text-md mb-1 font-medium text-gray-700">Name: {{ $order['name'] }}</p>
                            <p class="text-md text-gray-700">
                                Address: {{ $order['address'] }}
                            </p>
                            <p class="text-md text-gray-700 mb-3">
                                Contact: {{ $order['contact'] }}
                            </p>
                        </div>
                    </div>
                </a>
                <div class="bg-white py-4 px-3">
                    <div class="flex flex-col justify-between">
                        <div class="flex justify-between">
                            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 w-fit rounded-full">
                                    Show
                            </a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 w-fit rounded-full">
                                    Complete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
</x-app-layout>
