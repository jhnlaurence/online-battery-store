<x-app-layout>
    <div class="relative flex min-h-screen flex-col overflow-hidden py-6 sm:py-12">
        <div class="mx-auto max-w-screen-xl px-4 w-full">
          <h2 class="mb-4 font-bold text-xl text-gray-600">Choose the battery you need for your car: </h2>
          <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">
            
            @foreach ($batteries as $battery)
            <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                <div class="hover:text-white absolute z-30 top-0 right-0 mt-2 mr-2 bg-white py-.5 px-2 w-fit rounded-xl">
                    <h3 class="text-lg font-medium text-black">Php {{ $battery['price'] }}</h3>
                </div>
                
                <div class="h-auto overflow-hidden">
                    <div class="h-44 overflow-hidden relative">
                        <img src="https://picsum.photos/400/400" alt="">
                    </div>
                </div>
                <div class="bg-white py-4 px-3">
                    <h3 class="text-lg mb-1 font-medium">{{ $battery['brand'] }}</h3>
                    <div class="flex flex-col justify-between items-left">
                        <p class="text-sm text-gray-400 mb-3">
                            {{ $battery['warranty'] }} Months Warranty
                        </p>
                        <form action="{{ route('orders.store') }}" method="POST" >
                            @csrf
                            <input type="hidden" name="battery_id" value="{{ $battery['id'] }}">
                            <button type="submit"class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 w-fit rounded-full">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

          </div>
        </div>
    </div>
</x-app-layout>
