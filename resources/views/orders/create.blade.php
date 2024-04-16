<x-guest-layout>
    <form action="{{ route('orders.store') }}" method="POST" >
    <div class="grid gap-4 gap-y-4 grid-cols-1 lg:grid-cols-3 px-10 mt-10 xl:px-24">
            @csrf
        <div class="text-gray-600 xl:mr-20 flex flex-col justify-start lg:mt-16">
            <p class="font-medium text-lg">Creating an Order</p>
            <p>Please fill out all the fields first then choose the battery that you need.</p>

            @if(session('error'))
            <div class="hover:red-yellow-500 w-full mb-2 select-none border-l-4 border-red-400 bg-red-100 p-3 font-medium">
                {{ session('error') }}
            </div>
            @endif
            <div class="mt-8">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"
                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                placeholder="Name" />
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5">
                <label for="contact">Contact No. </label>
                <input type="number" name="contact" id="contact"
                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                placeholder="Ex: 9121234123" />
                @error('contact')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5">
                <label for="address">Full Address (Waze)</label>
                <input type="text" name="address" id="address"
                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                placeholder="House No. Street, City" />
                @error('address')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="bg-gray-900 p-5 mt-10">
                <p class="text-white">Note: The rider will call first before going to the location. Please answer the call to confirm the order.</p>
            </div>
        </div>
        {{-- * To make the items scrollable: place overflow and manipulate the height of the div. --}}
        <div class="lg:col-span-2 overflow-y-auto lg:h-[80vh]">
            <div class="relative flex flex-col ">
                <h2 class="mb-4 font-bold text-xl md:text-4xl text-gray-600 flex justify-center items-center">Choose the battery you need for your car: </h2>
                <div class="mx-auto max-w-screen-xl px-4 w-full flex justify-center">
                    
                    <div class="grid w-full md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6 justify-center items-center">
                    
                        @foreach ($batteries as $battery)
                        <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                            <div class="hover:text-white absolute z-30 top-0 right-0 mt-2 mr-2 bg-white py-.5 px-2 w-fit rounded-xl">
                                <h3 class="text-lg font-medium text-black">{{ $battery['stock'] }} pcs</h3>
                            </div>
                            
                            <div class="h-auto overflow-hidden">
                                <div class="h-44 overflow-hidden relative">
                                    <img src="https://picsum.photos/400/400" alt="">
                                </div>
                            </div>
                            <div class="bg-white py-4 px-3">
                                <h3 class="text-xl font-medium">{{ strtoupper($battery['size']) }} </h3>
                                <h3 class="text-lg mb-1 font-medium">{{ strtoupper($battery['brand_name']) }}</h3>
                                <div class="flex flex-col justify-between items-left">
                                    <p class="text-sm text-gray-400 mb-3">
                                        {{ $battery['month_warranty'] }} Months Warranty
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium text-black">Php {{ $battery['price'] }}</h3>
                                       
                                            <input type="hidden" name="battery_id" id="battery_id" value="{{ $battery['id'] }}">
                                            <button type="submit"class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 w-fit rounded-full">
                                                Order
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    
</x-guest-layout>
