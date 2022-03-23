@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="py-6 px-8 h-120 w-80 mt-20 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Prisijungimo vardas:</label>
                    <input name="username" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('username')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Slaptažodis:</label>
                    <input  name="password" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-gray-800 font-bold">El.paštas:</label>
                    <input name="email" type="email"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Registruotis</button>
            </form>
        </div>
    </div>
@endsection
