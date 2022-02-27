@extends('components.main')
@section('title', 'Login')
@section('body')
    <div class="w-full h-full px-4 grid grid-cols-1 justify-items-center">
        <h1 class="text-4xl underline my-5">Login to Your Account</h1>
        <div class="w-full max-w-md my-20">
            <form class="bg-white p-5 border rounded-lg shadow" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" type="email"/>
                    @error('email')
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
                    <input type="checkbox" id="remembermecheck" name="remembermecheck" />
                    <label for="remembermecheck">Remember Me</label>
                </div>
                <div class="w-full mb-6 grid grid-cols-1 justify-items-center">
                    <input class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Login" />
                </div>
                <div class="text-sm text-gray-500">
                    <p>Don't have an account? Click <a href="{{ route('auth.create') }}" class="text-blue-600">here</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
