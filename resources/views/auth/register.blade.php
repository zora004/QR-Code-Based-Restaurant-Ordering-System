@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="flex items-center justify-center p-6 lg:p-8">
        <div class="w-full max-w-md bg-white dark:bg-[#18181b] rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-extrabold mb-8 text-center text-[#1b1b18] dark:text-white tracking-tight">Register</h2>
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name"
                        class="block text-sm font-medium text-[#1b1b18] dark:text-gray-200 mb-2">Name</label>
                    <input type="text" id="name" name="name" required placeholder="Your name"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-[#232326] text-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <div>
                    <label for="email"
                        class="block text-sm font-medium text-[#1b1b18] dark:text-gray-200 mb-2">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Email address"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-[#232326] text-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <div>
                    <label for="password"
                        class="block text-sm font-medium text-[#1b1b18] dark:text-gray-200 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-[#232326] text-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-[#1b1b18] dark:text-gray-200 mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-[#232326] text-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold shadow cursor-pointer">
                    Register
                </button>
            </form>
            <p class="mt-8 text-center text-gray-600 dark:text-gray-300 text-sm">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>
            </p>
        </div>
    </div>
