@extends('components.main')
@section('title', 'Login')
@section('body')
    <div class="w-full h-full px-4 grid grid-cols-1 justify-items-center">
        <h1 class="text-4xl underline my-5">Create an Account</h1>
        <div class="w-full max-w-md my-20">
            <form class="bg-white p-5 border rounded-lg shadow" method="POST" action="{{ route('auth.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 font-bold mb-2">First Name:</label>
                    <input id="first_name" name="first_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="text"/>
                    @error('first_name')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 font-bold mb-2">Last Name:</label>
                    <input id="last_name" name="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="text"/>
                    @error('last_name')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="email"/>
                    @error('email')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="birth_day" class="block text-gray-700 font-bold mb-2">Birthday:</label>
                    <input id="birth_day" name="birth_day" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="date"/>
                    @error('birth_day')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                    <input id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="password" />
                    @error('password')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm Password:</label>
                    <input id="password_confirmation" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="password" />
                    @error('password_confirmation')
                    <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full my-6 grid grid-cols-1 justify-items-center">
                    <input class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Login" />
                </div>
                <div class="text-sm text-gray-500">
                    <p>Already have an Account? Click <a href="{{ route('login') }}" class="text-blue-600">here</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
