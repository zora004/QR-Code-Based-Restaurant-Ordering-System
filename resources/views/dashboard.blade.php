@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex items-center justify-center p-6 lg:p-8">
        <div class="w-full max-w-2xl bg-white dark:bg-[#18181b] rounded-2xl shadow-xl p-8">
            <main>
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-[#1b1b18] dark:text-white mb-2">Your Profile</h2>
                    <div class="bg-gray-100 dark:bg-[#232326] rounded-lg p-4">
                        <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Name:</span>
                            {{ auth()->user()->name }}</p>
                        <p class="text-gray-700 dark:text-gray-300"><span class="font-medium">Email:</span>
                            {{ auth()->user()->email }}</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-[#1b1b18] dark:text-white mb-2">Your Activities</h2>
                    <ul class="space-y-2">
                        <li class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg px-4 py-2">
                            Activity 1</li>
                        <li class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg px-4 py-2">
                            Activity 2</li>
                        <li class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg px-4 py-2">
                            Activity 3</li>
                    </ul>
                </div>
            </main>
        </div>
    </div>
@endsection
