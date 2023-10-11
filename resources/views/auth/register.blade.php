@extends('layouts.app-authentication')

@section('content')
<div class="grid grid-cols-3 gap-4">
    <div class="h-screen bg-cover bg-center col-span-2" style="background-image: url('https://images.unsplash.com/photo-1547245324-d777c6f05e80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');"></div>
    <div class="flex h-screen">
        <div class="grid grid-cols-1 gap-4 content-center m-auto">
            <div class="leading-5 mb-2">
                <p class="text-4xl">Register</p>
                <small>Please Register first if u didn't have account</small>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">fullname</label>
                    <input type="text" id="fullname" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john doe" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@gmail.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">assword</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                    <input type="password" id="password" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
                </div>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium dark:text-black">Show Password</label>
                </div>
                <div class="mb-3">
                  <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign Up</button>
                  <a href="/login">
                    <button type="button" class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Back</button>
                  </a>
                </div>
            </form>
        </div>
    </div>
</div>