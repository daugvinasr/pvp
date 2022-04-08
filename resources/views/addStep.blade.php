@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="py-6 px-8 h-120 w-max mt-20 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf

                @if (session('errormessage'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p class="font-bold">Klaida!</p>
                        <p>{{ session('errormessage') }}</p>
                    </div>
                @endif

                <div class="mb-6">
                    <label for="title" class="block text-gray-800 font-bold">Pavadinimas:</label>
                    <input name="title" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('title')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-800 font-bold">Aprašymas:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600 h-24"></textarea>
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="image_url" class="block text-gray-800 font-bold">Nuotraukos nuoroda:</label>
                    <input name="image_url" type="url"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('image_url')
                    {{ $message }}
                    @enderror
                </div>

                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Pridėti žingsnį</button>
            </form>
        </div>
    </div>
@endsection
