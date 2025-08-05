@extends('layouts.app')

@section('content')
    <div
        class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 via-white to-green-100">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Search/filter bar -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                <h1 class="text-4xl font-extrabold text-blue-700 mb-2">HELLO TABLE: <span
                        class="text-green-600">{{ $table->name }}</span></h1>
                <p class="text-lg text-gray-700 mt-2">UUID: <span class="font-mono text-gray-500">{{ $table->uuid }}</span>
                </p>
                <div class="mt-2 sm:mt-0 text-sm text-gray-600">
                    Tap an item to add to your order. Order summary is on the right (or below on mobile).
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Menu list -->
                <div class="lg:col-span-2 space-y-10" id="menu-list">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($menus as $item)
                            <div class="flex flex-col bg-cyan-950 rounded-xl shadow p-5 hover:shadow-lg transition relative"
                                data-name="{{ strtolower($item->name) }}">
                                @if (isset($item->image_path))
                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}"
                                        class="w-full h-32 object-cover rounded-md mb-3" />
                                @endif
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-semibold text-shadow-zinc-800">{{ $item->name }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">{{ $item->description }}</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-green-600 font-bold text-lg">${{ number_format($item->price, 2) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <label class="text-sm mr-1">Qty:</label>
                                        <input type="number" min="1" value="1"
                                            class="w-16 border rounded px-2 py-1 text-sm qty-input"
                                            data-id="{{ $item->id }}" />
                                    </div>
                                    <button data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                        data-price="{{ $item->price }}"
                                        class="add-to-order inline-flex items-center gap-2 bg-blue-600 text-shadow-zinc px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                                        Add
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order summary -->
                <div class="bg-cyan-950 rounded-xl shadow-lg p-6 flex flex-col" id="order-summary">
                    <h2 class="text-xl font-bold mb-4">Your Order</h2>
                    <div id="order-items" class="flex-1 space-y-3">
                        <p class="text-gray-500">No items yet.</p>
                    </div>
                    <div class="border-t pt-4 mt-4">
                        <div class="flex justify-between font-semibold">
                            <span>Subtotal</span>
                            <span id="order-subtotal">$0.00</span>
                        </div>
                        <div class="mt-3">
                            <button id="place-order"
                                class="w-full bg-green-600 text-shadow-zinc py-2 rounded-lg font-medium disabled:opacity-60"
                                disabled>
                                Confirm Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
